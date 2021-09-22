<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
class Pages extends BaseController
{
	protected $main_menu;
	protected $query;
	function __construct() {
		$this->main_menu = json_decode(file_get_contents(FCPATH .'content/main-menu.json'));
		$uri = current_url(true);

		list($t, $q) = array_pad(explode("/q/", $uri), 2, null);
		
		if(!empty($q))  {
			// echo "SET";
			$this->query = $q;
		} else {
			$this->query = '';
		}
	}
	public function index()
	{
		// print_r($this->main_menu);exit;

		$postsModel = model('App\Models\PostsModel');

		$db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select c.*, count(pc.cid) as catCount from categories c left join post_categories as pc on pc.cid = c.id join posts as p on p.id = pc.pid where p.status = 1 group by c.id order by c.id DESC');
        // $$query->getResultArray());
        $cats = $query->getResultArray();

		
		$postsModel->select('p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes', false)
		->from("posts as p", true)
		->join('post_categories as pc', 'pc.pid = p.id', 'left')
		->join('categories as c', 'c.id = pc.cid', 'left')
		->join('images as i', 'i.owner_id = p.id', 'left')
		->where('p.status', 1);
		// if($cat !== null ) {
		// 	$postsModel->where('c.slug', $cat);
		// } 
		$posts = $postsModel
		->groupBy('p.id')
		->orderBy('p.created_at', 'DESC')
		// ->getCompiledSelect();
		
		->limit(2)->get()->getResultArray();
		// echo "<pre>";
		// print_r($posts);
		// echo "</pre>";
		$catList = [];
		foreach ($cats as $c) {
			// print_r($c);
			$catList[$c["id"]] = slugify($c["category"]);
			$catList[$c["id"]] = $c["category"];
		}

		foreach ($posts as $k => $p) {
			if(!isset($posts[$k]["categorias"])) {
				$posts[$k]["categorias"] = [];
			}
			// $p["categoriass"][$]
			// var_dump($p['sel_categorias']);
			if (!empty($p['sel_categorias'])) {
				$pCategs = explode(", ", $p['sel_categorias']);
				foreach($pCategs as $pc) {
					// echo $pc . "<br>";
					$posts[$k]["categorias"][$pc] = $catList[$pc];
				}
			}
			
			// print_r($categs);
			// echo "<pre>";
			// print_r($pCategs); 
			// echo "</pre>";
			
		}
		// echo "<pre>";
		// print_r($posts);
		// echo "</pre>";
		return view('home', ['main_menu' => $this->main_menu, "lastPosts" => $posts]);
	}

	public function about()
	{
		return view('about', ['main_menu' => $this->main_menu]);
	}

	public function servicos($serv_slug = null, $content_slug = null)
	{
		if(!empty($content_slug)) {
			echo "Content";exit;
		}
		if(!empty($serv_slug)) {
			$content = json_decode(file_get_contents(FCPATH .'content/content-servicos.json'), true);
			if(isset($content[$serv_slug])) {
				$sContent = $content[$serv_slug];
			} else { throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); }
		} else { throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); }
		
		return view('services', ['main_menu' => $this->main_menu, 'cont' => $sContent]);
	}

	public function contact()
	{
		// $formData = [
		// 	"mensagem" => "Marcelo testando",
		// 	"nome" => "Marcelo",
		// 	"email" => "marcelo@..."
		// ];
		// return view('mail/contato', $formData);
		if ($this->request->isAJAX()) {
			// return json_encode(["method" => $this->request->getMethod() ]);
			$email = \Config\Services::email();

			// $config['protocol'] = 'sendmail';
			// $config['mailPath'] = '/usr/sbin/sendmail';
			// $config['charset']  = 'iso-8859-1';
			$config['mailType'] = 'html';

			$email->initialize($config);

			$email->setFrom('contato@brasilatuarial.com.br', 'Formulário Site');
			$email->setTo('enrico.neto@brasilatuarial.com.br', "Enrico Neto");
			$email->setCC('marcelo@agenciabrasildigital.com.br', "Marcelo Dênis");
			// $email->setBCC('them@their-example.com');
			// $email->mailType('html');

			$email->setSubject('Nova mensagem | Contato Brasil Atuarial');
			$formData = [
				"mensagem" => $this->request->getPost("message"),
				"nome" => $this->request->getPost("name"),
				"email" => $this->request->getPost("email")
			];
			$message = view('mail/contato', $formData);
			// var_dump($message);exit;

			$email->setMessage($message);

			$email->send();
            return json_encode(["ajax"=>TRUE]);
        } else {
			// return json_encode(["method" => $this->request->getMethod() ]);
			return view('contact', ['main_menu' => $this->main_menu] );
		}
	}

	public function courses()
	{
		return view('courses', ['main_menu' => $this->main_menu] );
	}

	public function solutions()
	{
		return view('solutions', ['main_menu' => $this->main_menu] );
	}
	public function dygo()
	{
		return view('dygo', ['main_menu' => $this->main_menu] );
	}

	public function find($q = null)
	{
		
		// print_r($cat);
		// exit;

		// $pager = \Config\Services::pager();
		// helper("slugurl");
		// helper("monthficator");
		// Create a shared instance of the model
		$postsModel = model('App\Models\PostsModel');
		// $p = $postsModel->select('p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes', false)
		// ->from("posts as p", true)
		// ->join('post_categories as pc', 'pc.pid = p.id', 'left')
		// ->join('categories as c', 'c.id = pc.cid', 'left')
		// ->join('images as i', 'i.owner_id = p.id', 'left')
		// ->where('p.status', 1)
		// ->groupBy('p.id')
		// // ->getCompiledSelect();
		// ->paginate(10);
		// ->get();
		// echo "<pre>";
		// print_r($p);
		// echo "</pre>";exit;
		$db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select c.*, count(pc.cid) as catCount from categories c left join post_categories as pc on pc.cid = c.id join posts as p on p.id = pc.pid where p.status = 1 group by c.id order by c.id DESC');
        // $$query->getResultArray());
        $cats = $query->getResultArray();
		
		// $query = $db->query('select p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes from posts p left join post_categories as pc on pc.pid = p.id left join categories as c on c.id = pc.cid left join images as i on i.owner_id = p.id where status = 1 group by p.id');
        // , GROUP_CONCAT(c.category SEPARATOR ", ") as categorias
		// $$query->getResultArray());
        // $posts = $query->getResultArray();
		$postsModel->select('p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes', false)
		->from("posts as p", true)
		->join('post_categories as pc', 'pc.pid = p.id', 'left')
		->join('categories as c', 'c.id = pc.cid', 'left')
		->join('images as i', 'i.owner_id = p.id', 'left')
		->where('p.status', 1);
		if($q !== null ) {
			$postsModel->like('p.post_title', $q, "%")
			->orLike('p.post_content', $q, "%");
		} 
		$posts = $postsModel
		->groupBy('p.id')
		// ->getCompiledSelect();
		->paginate(5, false);
		// $selCategorias = explode(", ", $posts[0]["sel_categorias"]);
        
        // $OrderedCats = [];
        // $toEnd = [];
        // foreach($cats as $c) {
        //     // echo "<pre>";
        //     // print_r($c['id']);
        //     // echo "</pre>";
        //     if(in_array($c['id'], $selCategorias)) {
        //         $OrderedCats[] = $c;
        //     } else {
        //         $toEnd[] = $c;
        //     }
        // }
        // $OrderedCats = array_merge($OrderedCats, $toEnd);
		$catList = [];
		foreach ($cats as $c) {
			// print_r($c);
			$catList[$c["id"]] = slugify($c["category"]);
			$catList[$c["id"]] = $c["category"];
		}
        // echo "<pre>";
        // print_r($cats);
        // // print_r($OrderedCats);
        // echo "</pre>"; exit;
		
		foreach ($posts as $k => $p) {
			if(!isset($posts[$k]["categorias"])) {
				$posts[$k]["categorias"] = [];
			}
			// $p["categoriass"][$]
			// var_dump($p['sel_categorias']);
			if (!empty($p['sel_categorias'])) {
				$pCategs = explode(", ", $p['sel_categorias']);
				foreach($pCategs as $pc) {
					// echo $pc . "<br>";
					$posts[$k]["categorias"][$pc] = $catList[$pc];
				}
			}
			
			// print_r($categs);
			// echo "<pre>";
			// print_r($pCategs); 
			// echo "</pre>";
			
		}

		
		$postsModel = model('App\Models\PostsModel');
		$lastPosts = $postsModel->select('p.id as id, p.post_title, p.created_at as created, p.updated_at as updated, i.image_path as imagem', false)
		->from("posts as p", true)

		->join('images as i', 'i.owner_id = p.id', 'left')
		->where('p.status', 1)
		
		->limit(5)->get()->getResultArray();
		foreach($lastPosts as $k=> $p) {
			$lastPosts[$k]['teste'] = $this->dateToTimeConvert($p['created']);
		}
		return view('blog', ['main_menu' => $this->main_menu, 'query'=>$this->query, 'cats'=>$cats, "posts"=> $posts, 'pager' => $postsModel->pager, "lastPosts" => $lastPosts] );
	}

	public function blog($cat = null)
	{
		
		// print_r($cat);
		// exit;

		// $pager = \Config\Services::pager();
		// helper("slugurl");
		// helper("monthficator");
		// Create a shared instance of the model
		$postsModel = model('App\Models\PostsModel');
		// $p = $postsModel->select('p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes', false)
		// ->from("posts as p", true)
		// ->join('post_categories as pc', 'pc.pid = p.id', 'left')
		// ->join('categories as c', 'c.id = pc.cid', 'left')
		// ->join('images as i', 'i.owner_id = p.id', 'left')
		// ->where('p.status', 1)
		// ->groupBy('p.id')
		// // ->getCompiledSelect();
		// ->paginate(10);
		// ->get();
		// echo "<pre>";
		// print_r($p);
		// echo "</pre>";exit;
		$db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select c.*, count(pc.cid) as catCount from categories c left join post_categories as pc on pc.cid = c.id join posts as p on p.id = pc.pid where p.status = 1 group by c.id order by c.id DESC');
        // $$query->getResultArray());
        $cats = $query->getResultArray();
		
		// $query = $db->query('select p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes from posts p left join post_categories as pc on pc.pid = p.id left join categories as c on c.id = pc.cid left join images as i on i.owner_id = p.id where status = 1 group by p.id');
        // , GROUP_CONCAT(c.category SEPARATOR ", ") as categorias
		// $$query->getResultArray());
        // $posts = $query->getResultArray();
		$postsModel->select('p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes', false)
		->from("posts as p", true)
		->join('post_categories as pc', 'pc.pid = p.id', 'left')
		->join('categories as c', 'c.id = pc.cid', 'left')
		->join('images as i', 'i.owner_id = p.id', 'left')
		->where('p.status', 1);
		if($cat !== null ) {
			$postsModel->where('c.slug', $cat);
		} 
		$posts = $postsModel
		->groupBy('p.id')
		// ->getCompiledSelect();
		->paginate(5, false);
		// $selCategorias = explode(", ", $posts[0]["sel_categorias"]);
        
        // $OrderedCats = [];
        // $toEnd = [];
        // foreach($cats as $c) {
        //     // echo "<pre>";
        //     // print_r($c['id']);
        //     // echo "</pre>";
        //     if(in_array($c['id'], $selCategorias)) {
        //         $OrderedCats[] = $c;
        //     } else {
        //         $toEnd[] = $c;
        //     }
        // }
        // $OrderedCats = array_merge($OrderedCats, $toEnd);
		$catList = [];
		foreach ($cats as $c) {
			// print_r($c);
			$catList[$c["id"]] = slugify($c["category"]);
			$catList[$c["id"]] = $c["category"];
		}
        // echo "<pre>";
        // print_r($cats);
        // // print_r($OrderedCats);
        // echo "</pre>"; exit;
		
		foreach ($posts as $k => $p) {
			if(!isset($posts[$k]["categorias"])) {
				$posts[$k]["categorias"] = [];
			}
			// $p["categoriass"][$]
			// var_dump($p['sel_categorias']);
			if (!empty($p['sel_categorias'])) {
				$pCategs = explode(", ", $p['sel_categorias']);
				foreach($pCategs as $pc) {
					// echo $pc . "<br>";
					$posts[$k]["categorias"][$pc] = $catList[$pc];
				}
			}
			
			// print_r($categs);
			// echo "<pre>";
			// print_r($pCategs); 
			// echo "</pre>";
			
		}

		
		$postsModel = model('App\Models\PostsModel');
		$lastPosts = $postsModel->select('p.id as id, p.post_title, p.created_at as created, p.updated_at as updated, i.image_path as imagem', false)
		->from("posts as p", true)

		->join('images as i', 'i.owner_id = p.id', 'left')
		->where('p.status', 1)
		
		->limit(5)->get()->getResultArray();
		foreach($lastPosts as $k=> $p) {
			$lastPosts[$k]['teste'] = $this->dateToTimeConvert($p['created']);
		}
		return view('blog', ['main_menu' => $this->main_menu, 'cats'=>$cats, "posts"=> $posts, 'pager' => $postsModel->pager, "lastPosts" => $lastPosts] );
	}

	public function blogPost($slug)
	{
		// print_r($slug);exit;
		// helper("slugurl");
		// helper("monthficator");
		$db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select c.*, count(pc.cid) as catCount from categories c left join post_categories as pc on pc.cid = c.id join posts as p on p.id = pc.pid where p.status = 1 group by c.id order by c.id DESC');
        // $$query->getResultArray());
        $cats = $query->getResultArray();
		$qry = 'select p.id as id, p.post_title, p.post_content, p.status, ';
		$qry .= 'DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, ';
		$qry .= 'DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, ';
		$qry .= 'GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem, ';
		$qry .= 'DATE_FORMAT(p.created_at, "%d") as dia, DATE_FORMAT(p.created_at, "%m") as mes ';
		$qry .= 'from posts p left join post_categories as pc on pc.pid = p.id ';
		$qry .= 'left join categories as c on c.id = pc.cid ';
		$qry .= 'left join images as i on i.owner_id = p.id where status = 1 ';
		$qry .= 'AND p.slug = "'. $slug .'" group by p.id';

		$query = $db->query($qry);
        // , GROUP_CONCAT(c.category SEPARATOR ", ") as categorias
		// $$query->getResultArray());
        $post = $query->getRowArray();
		if (is_null($post))
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

		// $selCategorias = explode(", ", $posts[0]["sel_categorias"]);
        // echo "<pre>";
		//  var_dump($post); 
		// echo "</pre>";exit;
        // $OrderedCats = [];
        // $toEnd = [];
        // foreach($cats as $c) {
        //     // echo "<pre>";
        //     // print_r($c['id']);
        //     // echo "</pre>";
        //     if(in_array($c['id'], $selCategorias)) {
        //         $OrderedCats[] = $c;
        //     } else {
        //         $toEnd[] = $c;
        //     }
        // }
        // $OrderedCats = array_merge($OrderedCats, $toEnd);
		$catList = [];
		foreach ($cats as $c) {
			// print_r($c);
			$catList[$c["id"]] = slugify($c["category"]);
			$catList[$c["id"]] = $c["category"];
		}
        // echo "<pre>";
        // print_r($catList);
        // // print_r($OrderedCats);
        // echo "</pre>"; exit;

		if(!isset($post["categorias"])) {
			$post["categorias"] = [];
		}
		// $p["categoriass"][$]
		$pCategs = explode(", ", $post['sel_categorias']);
		// print_r($categs);
		// echo "<pre>";
		// print_r($pCategs); 
		// echo "</pre>";
		
		foreach($pCategs as $pc) {
			// echo $pc . "<br>";
			$post["categorias"][$pc] = $catList[$pc];
		}



		$postsModel = model('App\Models\PostsModel');
		$lastPosts = $postsModel->select('p.id as id, p.post_title, p.created_at as created, p.updated_at as updated, i.image_path as imagem', false)
		->from("posts as p", true)
		// ->join('post_categories as pc', 'pc.pid = p.id', 'left')
		// ->join('categories as c', 'c.id = pc.cid', 'left')
		->join('images as i', 'i.owner_id = p.id', 'left')
		
		->where('p.status', 1)
		->whereNotIn('p.id', [$post["id"]])
		// ->getCompiledSelect();
		->limit(5)->get()->getResultArray();
		// $dt   = "2021-09-01 16:18:42";
		// // echo $dt;
		// // $this->dateToTimeConvert($dt);
		foreach($lastPosts as $k=> $p) {
			$lastPosts[$k]['teste'] = $this->dateToTimeConvert($p['created']);
		}
		// print_r($this->dateToTimeConvert($dt));
		
		// echo "<pre>";
		//  print_r($lastPosts); 
		// echo "</pre>";
		// exit;
		return view('blog_post', ['main_menu' => $this->main_menu, 'cats'=>$cats, "post"=> $post, "lastPosts"=>$lastPosts] );
	}
	public function dateToTimeConvert ($fulldate) {
		list($date, $time) = explode(" ", $fulldate);
		list($year, $month, $day) = explode("-", $date);
		list($hour, $minutes, $seconds) = explode(":", $time);
		$rtime = Time::create($year, $month, $day, $hour, $minutes, $seconds, 'America/Sao_Paulo', "pt_BR");
		return $rtime->humanize();
	}
}
