<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Admin\Entities\Post;
use Modules\Admin\Entities\Tag;
use Modules\Admin\Entities\PostCategory;
use Illuminate\Http\Request;
use App\User;
use Validator;
use DateTime;

class PostsController extends Controller {

	private $post, $user, $postCategory, $tag;

	public function __construct(Post $post, User $user, PostCategory $postCategory, Tag $tag)
	{
			$this->post = $post;
			$this->user = $user;
			$this->postCategory = $postCategory;
			$this->tag = $tag;
	}

	public function index(Request $request)
	{

			$isFilter = false;

			if (count($request->query) > 0) {

						$isFilter = true; // Filtros acionados
						$title = $request->get('title');
						$user_id = $request->get('user_id');
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

						$posts = $this->post
										->whereRaw(!empty($title) ? "title like '%$title%'" : '1 = 1')
										->whereRaw(!empty($user_id) ? "user_id = $user_id" : '1 = 1')
										->whereRaw(!empty($created_at) ? "created_at >= '$created_at'" : '1 = 1')
										->whereRaw(!empty($created_end) ? "created_at <= '$created_end'" : '1 = 1' )
										->sortable()->get();
			} else {
						$posts = $this->post->sortable()->get();
			}

			$users = $this->user->orderBy('name', 'asc')->lists('name', 'id');
			return view('admin::posts.index', ['posts' => $posts, 'users' => $users, 'isFilter' => $isFilter]);
	}

	public function add()
	{
			$users = $this->user->orderBy('name', 'asc')->lists('name', 'id');
			$postCategories = $this->postCategory->orderBy('name', 'asc')->lists('name', 'id');
			$tags = $this->tag->orderBy('name', 'asc')->lists('name', 'id');
			return view('admin::posts.add', ['users' => $users, 'postCategories' => $postCategories, 'tags' => $tags]);
	}

	public function show($id)
	{
			$post = $this->post->find($id);
			if ($post)
			{
					return view('admin::posts.show', ['post' => $post]);
			} else {
					return redirect('/admin/posts')->with('error-msg', 'Post não encontrado!');
			}
	}

	public function store(Request $request)
	{

			$this->validate($request, [
					'title' => 'required|unique:posts|max:255',
					'body' => 'required'
			]);

			$post = new Post($request->all());
			$post->slug = str_slug($request->get('title'));



			if($post->save())
			{
					$tag_ids = $request->get('tag_id');

					if(!empty($tag_ids))
					{
							$post->tags()->attach($tag_ids);
					}
					return redirect('/admin/posts')->with('msg', 'O Post foi salvo com sucesso!');
			} else {
					return redirect()->back()->with('error-msg', 'O Post não pode ser salvo. Por favor, tente novamente.');
			}


	}

	public function edit($id)
	{
			$post = $this->post->find($id);

			if($post)
			{
					$tags_list = $post->tags->lists('id');
					$users = $this->user->orderBy('name', 'asc')->lists('name', 'id');
					$postCategories = $this->postCategory->orderBy('name', 'asc')->lists('name', 'id');
					$tags = $this->tag->orderBy('name', 'asc')->lists('name', 'id');

					return view('admin::posts.edit', [
							'post' => $post,
							'users' => $users,
							'postCategories' => $postCategories,
							'tags' => $tags,
							'tags_list' => $tags_list,
					]);

			} else {
					return redirect('/admin/posts')->with('error-msg', 'Houve um erro. O post não existe no sistema');
			}


	}

	public function update(Request $request, $id)
	{
			$post = $this->post->find($id);

			$this->validate($request, [
					'title' => 'required|unique:posts,title,'.$post->id,
					'body' => 'required',
					'slug' => 'required|unique:posts,slug,'.$post->id,
			]);

			$validSlug = str_slug($request->get('slug'));
			$request->offsetSet('slug', $validSlug);

			if($post) {
					if($post->update($request->all()))
					{
							return redirect('/admin/posts')->with('msg', 'O post foi atualizado com sucesso!');
					} else {
							return redirect()->back()->with('error-msg', 'O post não pôde ser salvo. Por favor, tente novamente.');
					}
			} else {
					return redirect('/admin/posts')->with('error-msg', 'O post não pôde ser encontrado. Nenhuma alteração feita.');
			}
	}

	public function delete($id)
	{

	}

	public function destroy($id)
	{
			$post = $this->post->find($id);

			if($post)
			{
				if($post->delete())
				{
						return redirect()->back()->with('msg', 'O post foi excluído com sucesso');
				} else {
						return redirect()->back()->with('error-msg', 'O post não pôde ser excluído. Por favor, tente novamente.');
				}
			} else {
						return redirect()->back()->with('error-msg', 'O post não existe em nosso banco de dados.');
			}
	}



}
