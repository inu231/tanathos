<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Admin\Entities\Post;
use Modules\Admin\Entities\PostCategory;
use Illuminate\Http\Request;
use Validator;
use DateTime;

class PostCategoriesController extends Controller {

	private $postCategory;

	public function __construct(PostCategory $postCategory)
	{
			$this->postCategory = $postCategory;
	}

	public function index(Request $request)
	{
			$isFilter = false;
			
			if (count($request->query) > 0)
			{
					$isFilter = true;
					$name = $request->get('name');
					$description = $request->get('description');

					$postsCategories = PostCategory::
															whereRaw(!empty($name)? "name LIKE '%$name%'" : '1 = 1')
															->whereRaw(!empty($description)? "description LIKE '%$description%'": '1 = 1')
															->sortable()->paginate(15);
			} else {
					$postsCategories = PostCategory::sortable()->paginate(15);
			}

			return view('admin::postCategories.index', ['postsCategories' => $postsCategories, 'isFilter' => $isFilter]);
	}

	public function show($id)
	{
			$postCategory = $this->postCategory->find($id);
			return view('admin::postCategories.show', ['postCategory' => $postCategory]);
	}

	public function add()
	{
			return view('admin::postCategories.add');
	}

	public function store(Request $request)
	{
				$validator = Validator::make($request->all(), [
            'name' => 'required|unique:post_categories|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/post-categories/add')
                        ->withErrors($validator)
                        ->withInput();
        }


		 $postCategory = new PostCategory($request->all());

		 if ($postCategory->save())
		 {
			 	return redirect('/admin/post-categories')->with('msg', 'A Categoria foi salva com sucesso!');
		 } else {
			 	return redirect('/admin/post-categories')->with('error-msg', 'A categoria não pode ser salva. Por favor, tente novamente.');
		 }
	}

	public function edit($id)
	{
			$postCategory = PostCategory::find($id);

			if ($postCategory)
			{
				return view('admin::postCategories.edit', ['postCategory' => $postCategory]);
			} else {
				return redirect('/admin/post-categories')->with('error-msg', 'A categoria não pode ser encontrada');
			}
	}

	public function update(Request $request, $id)
	{
			$postCategory = $this->postCategory->find($id);

			$this->validate($request, [
					'name' => 'required|unique:post_categories,name,'.$postCategory->id
			]);

			if($postCategory)
			{
					if($postCategory->update($request->all()))
					{
							return redirect('/admin/post-categories')->with('msg', 'A categoria foi atualizada com sucesso!');
					} else {
							return redirect('/admin/post-categories')->with('error-msg', 'Houve um erro ao atualizar a categoria. Por favor, tente novamente.');
					}
			} else {
					return redirect('/admin/post-categories')->with('error-msg', 'Houve um erro ao efetuar a operação. A Categoria não foi encontrada');
			}
	}

	public function destroy($id)
	{
			$postCategory = PostCategory::find($id);

			if($postCategory)
			{
					if($postCategory->delete())
					{
							return redirect('/admin/post-categories')->with('msg', 'Categoria excluída com sucesso!');
					} else {
							return redirect('/admin/post-categories')->with('error-msg', 'A categoria não pode ser excluída. Por favor, tente novamente!');
					}
			} else {
					return redirect('/admin/post-categories')->with('error-msg', 'Houve um erro ao efetuar a operação. A Categoria não foi encontrada.');
			}
	}

}
