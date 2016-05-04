<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Admin\Entities\Banner;
use Modules\Admin\Entities\Tag;
use Illuminate\Http\Request;
use App\User;
use Validator;
use DateTime;
use Storage;

class BannersController extends Controller {

	private $banner;

	public function __construct(Banner $banner)
	{
			$this->banner = $banner;
	}

	public function index(Request $request)
	{

			$isFilter = false;

			if (count($request->query) > 0)
			{
					$isFilter = true;
					$name = $request->get('name');
					$description = $request->get('description');

					$banners = $this->banner
										->whereRaw(!empty($name)? "name LIKE '%$name%'" : '1 = 1')
										->whereRaw(!empty($description)? "description LIKE '%$description%'": '1 = 1')
										->sortable()->paginate(15);
			} else {
					$banners = $this->banner->sortable()->paginate(15);
			}

			return view('admin::banners.index', ['banners' => $banners, 'isFilter' => $isFilter]);
	}

	public function show($id)
	{
			$banner = $this->banner->find($id);
			return view('admin::banners.show', ['banner' => $banner]);
	}

	public function add()
	{
			return view('admin::banners.add');
	}

	public function store(Request $request)	{

				$validator = Validator::make($request->all(), [
						//'name' => 'required|unique:banners|max:255',
				]);

				if ($validator->fails()) {
						return redirect('/admin/banners/add')
												->withErrors($validator)
												->withInput();
				}

		 $image = $this->upload($request);



		 $banner = new Banner(\Input::all());
		 $banner->content_type = $image['extension'];
		 $banner->file_name = $image['file_name'];
		 $banner->file_size = $image['file_size'];


		 if ($banner->save())
		 {
				return redirect('/admin/banners')->with('msg', 'O banner foi salva com sucesso!');
		 } else {
				return redirect('/admin/banners')->with('error-msg', 'O banner não pode ser salva. Por favor, tente novamente.');
		 }
	}

	public function edit($id)
	{
			$banner = banner::find($id);

			if ($banner)
			{
				return view('admin::banners.edit', ['banner' => $banner]);
			} else {
				return redirect('/admin/banners')->with('error-msg', 'A banner não pode ser encontrada');
			}
	}

	public function update(Request $request, $id)
	{
			$banner = $this->banner->find($id);

			$this->validate($request, [
					//'name' => 'required|unique:banners,name,'.$banner->id
			]);


			if($banner)
			{
					$image = $this->upload($request);

					$banner->content_type = $image['extension'];
					$banner->file_name = $image['file_name'];
					$banner->file_size = $image['file_size'];
					$banner->save();

					if($banner->update($request->all()))
					{
							return redirect('/admin/banners')->with('msg', 'A banner foi atualizada com sucesso!');
					} else {
							return redirect('/admin/banners')->with('error-msg', 'Houve um erro ao atualizar a banner. Por favor, tente novamente.');
					}
			} else {
					return redirect('/admin/banners')->with('error-msg', 'Houve um erro ao efetuar a operação. A banner não foi encontrada');
			}
	}

	public function destroy($id)
	{
			$banner = $this->banner->find($id);

			if($banner)
			{
					if($banner->delete())
					{
							return redirect('/admin/banners')->with('msg', 'banner excluída com sucesso!');
					} else {
							return redirect('/admin/banners')->with('error-msg', 'A banner não pode ser excluída. Por favor, tente novamente!');
					}
			} else {
					return redirect('/admin/banners')->with('error-msg', 'Houve um erro ao efetuar a operação. A banner não foi encontrada.');
			}
	}

	public function upload(Request $request)
	{

			$files = $request->file('files');

			if (!empty($files))
			{
				foreach ($files as $file) {
					$file_name = $file->getClientOriginalName();
					Storage::put($file_name, file_get_contents($file));
					$extension = $file->getClientOriginalExtension();
					$size = Storage::size($file->getClientOriginalName());
				}

				return [
					'extension' => $extension,
					'file_name' => $file_name,
					'file_size' => $size,
				];
			}

	}

}
