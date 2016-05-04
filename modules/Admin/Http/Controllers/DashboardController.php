<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Admin\Entities\Page;
use Modules\Admin\Entities\Post;
use Modules\Admin\Entities\User;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Entities\Banner;
use Modules\Admin\Entities\Tag;

class DashboardController extends Controller {

	public function index()
	{
		$posts = count(Post::lists('id'));

		return view('admin::dashboard.index', [
				'posts' => $posts,
		]);
	}

}
