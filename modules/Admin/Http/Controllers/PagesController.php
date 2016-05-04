<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Admin\Entities\page;
use Illuminate\Http\Request;
use App\Http\Requests;
use DateTime;


class PagesController extends Controller {

	private $page;
	private $controller = 'pages';

	public function __construct(Page $page)
	{
			$this->page = $page;
	}

	public function index(Request $request)
	{

		$isFilter = false;

		if(count($request->query) > 0) {

			$isFilter = true;

			$title = $request->get('title');
			$slug = $request->get('slug');
			$created_at = $request->get('created_at');
			$created_end = $request->get('created_end');

			if(!empty($created_at)) {
				$created_at = DateTime::createFromFormat('d/m/Y', $created_at);
				$created_at = $created_at->format('Y-m-d 00:00:00');
			}
			if(!empty($created_end)) {
				$created_end = DateTime::createFromFormat('d/m/Y', $created_end);
				$created_end = $created_end->format('Y-m-d 23:59:59');
			}

			$pages = $this->page
							->whereRaw(!empty($title) ? "title like '%$title%'" : '1 = 1')
							->whereRaw(!empty($slug) ? "slug like '%$slug%'" : '1 = 1')
							->whereRaw(!empty($created_at) ? "created_at >= '$created_at'" : '1 = 1')
							->whereRaw(!empty($created_end) ? "created_at <= '$created_end'" : '1 = 1' )
							->sortable()->paginate(15);
		} else {
			$pages = $this->page->sortable()->paginate(15);
		}

		$parents = $this->page->where('parent_id', null)->orWhere('parent_id', 0)->lists('title', 'id');

		return view('admin::pages.index', ['pages' => $pages, 'isFilter' => $isFilter, 'parents' => $parents]);

	}

	public function show($id)
	{
			$page = $this->page->find($id);
			return view('admin::pages.show', ['page' => $page]);
	}

	public function add()
	{
			$parents = $this->page->where('parent_id', null)->orderBy('title', 'asc')->lists('title', 'id');

			return view('admin::pages.add', ['parents' => $parents]);
	}

	public function store(Request $request)
	{

			$this->validate($request, [
					'title' => 'required|unique:pages|max:255',
					'content' => 'required',
			]);

			$page = new Page($request->all());
			$page->slug = str_slug($request->all()['title']);
			$page->save();
			return redirect('/admin/pages')->with('msg', 'O registro foi salvo com sucesso!');
	}

	public function edit($id)
	{
			$page = $this->page->find($id);
			$parents = $this->page->where('parent_id', null)->orderBy('title', 'asc')->lists('title', 'id');
			return view('admin::pages.edit', ['page' => $page, 'parents' => $parents]);
	}

	public function update($id, Request $request)
	{

			$page = $this->page->find($id);
			$request->offsetSet('slug', str_slug($request->get('title')));

			$this->validate($request, [
					'title' => 'required|unique:pages,title,'.$page->id,
					'content' => 'required',
					'slug' => 'required|unique:pages,slug,'.$page->id,
			]);

			if ($page)
			{
					$page->slug = str_slug($request->get('title'));

					$page->update($request->all());
					return redirect('/admin/pages')->with('msg', 'O registro foi atualizado com sucesso!');
			} else {
					return redirect()->back()->with('error-msg', 'O regisro não pôde ser salvo');
			}
	}

	public function destroy($id)
	{

			$page = $this->page->find($id);
			if ($page)
			{
					$page->delete();
					return redirect('/admin/pages')->with('msg', 'O registro foi excluído com sucesso!');
			}
	}

}
