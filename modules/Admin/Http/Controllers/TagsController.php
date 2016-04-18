<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Admin\Entities\Post;
use Modules\Admin\Entities\Tag;
use Illuminate\Http\Request;
use App\User;
use Validator;
use DateTime;

class TagsController extends Controller {

	private $tag;

	public function __construct(Tag $tag)
	{
			$this->tag = $tag;
	}

	public function index(Request $request)
	{
			if (count($request->query) > 0)
			{
					$name = $request->get('name');
					$description = $request->get('description');

					$tags = $this->tag
										->whereRaw(!empty($name)? "name LIKE '%$name%'" : '1 = 1')
										->whereRaw(!empty($description)? "description LIKE '%$description%'": '1 = 1')
										->sortable()->paginate(15);
			} else {
					$tags = $this->tag->sortable()->paginate(15);
			}

			return view('admin::tags.index', ['tags' => $tags]);
	}

	public function show($id)
	{
			$tag = $this->tag->find($id);
			return view('admin::tags.show', ['tag' => $tag]);
	}

	public function add()
	{
			return view('admin::tags.add');
	}

	public function store(Request $request)
	{
				$validator = Validator::make($request->all(), [
            'name' => 'required|unique:tags|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/tags/add')
                        ->withErrors($validator)
                        ->withInput();
        }


		 $tag = new tag($request->all());

		 if ($tag->save())
		 {
			 	return redirect('/admin/tags')->with('msg', 'A tag foi salva com sucesso!');
		 } else {
			 	return redirect('/admin/tags')->with('error-msg', 'A tag não pode ser salva. Por favor, tente novamente.');
		 }
	}

	public function edit($id)
	{
			$tag = tag::find($id);

			if ($tag)
			{
				return view('admin::tags.edit', ['tag' => $tag]);
			} else {
				return redirect('/admin/tags')->with('error-msg', 'A tag não pode ser encontrada');
			}
	}

	public function update(Request $request, $id)
	{
			$tag = $this->tag->find($id);

			$this->validate($request, [
					'name' => 'required|unique:tags,name,'.$tag->id
			]);

			if($tag)
			{
					if($tag->update($request->all()))
					{
							return redirect('/admin/tags')->with('msg', 'A tag foi atualizada com sucesso!');
					} else {
							return redirect('/admin/tags')->with('error-msg', 'Houve um erro ao atualizar a tag. Por favor, tente novamente.');
					}
			} else {
					return redirect('/admin/tags')->with('error-msg', 'Houve um erro ao efetuar a operação. A tag não foi encontrada');
			}
	}

	public function destroy($id)
	{
			$tag = $this->tag->find($id);

			if($tag)
			{
					if($tag->delete())
					{
							return redirect('/admin/tags')->with('msg', 'tag excluída com sucesso!');
					} else {
							return redirect('/admin/tags')->with('error-msg', 'A tag não pode ser excluída. Por favor, tente novamente!');
					}
			} else {
					return redirect('/admin/tags')->with('error-msg', 'Houve um erro ao efetuar a operação. A tag não foi encontrada.');
			}
	}


}
