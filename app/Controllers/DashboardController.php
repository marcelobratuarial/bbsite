<?php 

namespace App\Controllers;  

use CodeIgniter\Controller;

  
class DashboardController extends BaseController
{
    

    public function fileUpload()
    {
        // $session = session();
        // // echo "Hey User : ".$session->get('name');
        // $dash = [
        //     "usession" => $session
        // ];
        // return view('dashboard', [ 'dash' => $dash ]);
        $rdata = $this->request->getFile('file');
        // print_r(ROOTPATH .'/public/blog/posts/');exit;
        
        $name = $rdata->getRandomName();
        $rdata->move(ROOTPATH . 'public/blog/posts/', $name);
        // print_r(ROOTPATH .'/public/blog/posts/'.$name);exit;
        // $path = $this->request->getFile('file')->store(ROOTPATH .'/public/blog/posts/');
        return json_encode( [ 'url' => base_url('public/blog/posts/'.$name)] );
    }

    public function index()
    {
        $session = session();
        // echo "Hey User : ".$session->get('name');
        $dash = [
            "usession" => $session
        ];
        return view('dashboard', [ 'dash' => $dash ]);
    }

    public function postEdit($id)
    {
        // print_r($id);exit;
        $session = session();
        // echo "Hey User : ".$session->get('name');
        $db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select * from categories c order by c.category ASC');
        // $$query->getResultArray());
        $cats = $query->getResultArray();
        
        $db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select p.id as id, p.post_title, p.post_content, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.category SEPARATOR ", ") as categorias, GROUP_CONCAT(c.id SEPARATOR ", ") as sel_categorias, i.image_path as imagem from posts p left join post_categories as pc on pc.pid = p.id left join categories as c on c.id = pc.cid left join images as i on i.owner_id = p.id where p.id = '.$id.' group by p.id');
        // $$query->getResultArray());
        $post = $query->getResultArray();
        $selCategorias = explode(", ", $post[0]["sel_categorias"]);
        
        $OrderedCats = [];
        $toEnd = [];
        foreach($cats as $c) {
            // echo "<pre>";
            // print_r($c['id']);
            // echo "</pre>";
            if(in_array($c['id'], $selCategorias)) {
                $OrderedCats[] = $c;
            } else {
                $toEnd[] = $c;
            }
        }
        $OrderedCats = array_merge($OrderedCats, $toEnd);
        // echo "<pre>";
        // print_r($post);
        // print_r($OrderedCats);
        // echo "</pre>"; exit;
        // $post[0]['post_content'] = $post[0]['post_content'];
        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";

        

        $dash = [
            "usession" => $session,
            "cats" => $OrderedCats,
            "post" => $post
        ];
        // exit;
        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";exit;
        return view('edit_post', [ 'dash' => $dash ]);
    }
    public function publishPost() {
        $rdata = $this->request->getPost();
        $db = db_connect();
        // echo "<pre>";
        // print_r($rdata);
        // echo "</pre>";
        // $$query->getResultArray());
        $query = $db->query('select p.id as pid, status from posts p where p.id = '.$rdata["post"]);
        $post = $query->getRowArray();
        // print_r($post);exit;
        if(!empty($post)) {
            $st = $post['status'] ? 0 : 1;
            $stText = $st ? "Publicado" : "Não publicado";
            // print_r('UPDATE posts SET status = '. $st .' WHERE id = '.$post['pid']);
            $query = $db->query('UPDATE posts SET status = '. $st .' WHERE id = '.$post['pid']);
                    
            
        }
        // $query = $db->query('select * from images where id = ');
        // $$query->getRowArray());
        // $cats = $query->getRowArray();
        // unlink(string $filename, resource $context = ?): int
        return json_encode([$stText]);
    }
    public function removeImagePost() {
        $rdata = $this->request->getPost();
        $db = db_connect();
        // echo "<pre>";
        // print_r($rdata);
        // echo "</pre>";
        // $$query->getResultArray());
        $query = $db->query('select p.id as pid, i.id, i.image_path as imagem from posts p right join images as i on i.owner_id = p.id where p.id = '.$rdata["post"].' group by p.id');
        $post = $query->getRowArray();
        // print_r($post);exit;
        if(!empty($post)) {
            $exists = file_exists(ROOTPATH . '/'. $post['imagem']);
            if ($exists) {
                $query = $db->query('Delete from images WHERE id = '.$post['id']);
                    
                unlink(ROOTPATH . '/'. $post['imagem']);
            }
        }
        // $query = $db->query('select * from images where id = ');
        // $$query->getRowArray());
        // $cats = $query->getRowArray();
        // unlink(string $filename, resource $context = ?): int
        return json_encode(["OK"]);
    }
    public function postCreate()
    {
        $session = session();
        // echo "Hey User : ".$session->get('name');
        $db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select * from categories c order by c.category ASC');
        // $$query->getResultArray());
        $cats = $query->getResultArray();
        // echo "<pre>";
        // print_r($cats);
        // echo "</pre>";
        $dash = [
            "usession" => $session,
            "cats" => $cats
        ];
        return view('create_post', [ 'dash' => $dash ]);
    }

    public function savePost()
    {
        $rdata = $this->request->getPost();
        // echo "<pre>";
        // print_r($this->request->getPost());
        // echo stripslashes(json_encode($rdata['post_content'], true, JSON_UNESCAPED_SLASHES));
        // echo "<hr>";
        // echo json_encode(stripslashes($rdata['post_content']));
        // echo "<hr>";
        // echo stripslashes(json_encode($rdata['post_content']));
        // echo "<hr>";
        // echo stripslashes($rdata['post_content']);
        // echo "<hr>";
        // echo json_encode($rdata['post_content']);
        // echo "<hr>";
        // echo json_encode($rdata['post_content'], JSON_UNESCAPED_SLASHES);
        // echo "</pre>"; //exit;
        
        if ($this->request->isAJAX())
        {
            
            $session = session();
            // $content = json_encode($rdata['post_content'], JSON_UNESCAPED_SLASHES);
            $db = db_connect();
            $content = $rdata['post_content']; //$db->escape($rdata['post_content']);
            $data = [
                'slug' => slugify($rdata['post_title']),
                'post_title' => $rdata['post_title'],
                'post_content' => $content,
                'author_id' => 1,
                // 'status' => 0,
            ];
            // print_r($data);
            $currentCats = [];
            if(isset($rdata['pid'])) {
                // $data['id']
                $a = $rdata['pid'];
                $r = $db->table('posts')->update($data, ["id" => $rdata["pid"]]);
                if(isset($rdata['categorias'])) {
                    $ids = implode(", ", $rdata['categorias']);
                    // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
                    $query = $db->query('Delete from post_categories WHERE pid = '.$a.' and cid not in('.$ids.')');
                    $queryCurrentCats = $db->query('select GROUP_CONCAT(cid SEPARATOR ", ") as currCats from post_categories WHERE pid = '.$a.' and cid in('.$ids.')');
                    
                    // print_r('select * from post_categories WHERE pid = '.$a.' and cid not in('.$ids.')');
                    $currentCats = explode(", ",$queryCurrentCats->getRowArray()['currCats']);
                    
                    // $cats = $query->getResultArray();
                    // print_r($currentCats);
                } else {
                    $query = $db->query('Delete from post_categories WHERE pid = '.$a);
                }
                // $current = $db->table('post_categories')->select('*')
                //  ->where('id', $a)
                //  ->get()->getResultArray();
                // echo "if";
                // $r = $db->table('categories')->update($data, ["id" => $rdata["pid"]]);
                // $a = $rdata["pid"];
                $edit = true;
            } else {
                // echo "else";
                $r = $db->table('posts')->insert($data);
                
                $a = $db->insertID();
                
                $edit = false;
            }
            if(isset($rdata['categorias'])) {
                foreach($rdata['categorias'] as $c) {
                    if(!in_array($c, $currentCats)) {
                        $r = $db->table('post_categories')->insert([
                            'pid' => $a,
                            'cid' => $c
                        ]);
                    }
                    
                }
            }


            $imagemDestacada = $this->request->getFile('image');
            // print_r(ROOTPATH .'/public/blog/posts/');exit;
            $image = false;
            if($imagemDestacada && $imagemDestacada->isValid()) {
                $name = $imagemDestacada->getRandomName();
                $imagemDestacada->move(ROOTPATH . 'public/blog/posts/', $name);
                $exists = file_exists(ROOTPATH . 'public/blog/posts/' . $name);
                if ($exists) {
                    $db = db_connect();
                    $data = [
                        'owner_id' => $a,
                        'image_path' => 'public/blog/posts/' . $name // base_url('public/blog/posts/'.$name)
                    ];
                    $r = $db->table('images')->insert($data);
                    $image = true;
                }
            }
            
            // print_r(ROOTPATH .'/public/blog/posts/'.$name);exit;

            // $path = $this->request->getFile('file')->store(ROOTPATH .'/public/blog/posts/');
            // return json_encode( [ 'url' => base_url('public/blog/posts/'.$name)] );
            // print_r($db->insertID());
            $reg = $db->table('posts')->select('*')
                 ->where('id', $a)
                 ->limit(1)
                 ->get()->getResultArray();
            return json_encode(["res" => $r, "reg" => $reg, "edit" => $edit, 'image'=>$image]);
        }
        
        // echo "Hey User : ".$session->get('name');
        // $dash = [
        //     "usession" => $session
        // ];
        // return view('posts_list', ['dash' => $dash ]);
        print_r("tesafdafsadfasd");
    }

    
    public function postsList()
    {
        $session = session();
        // echo "Hey User : ".$session->get('name');
        $db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select p.id as id, p.post_title, p.status, DATE_FORMAT(p.created_at, "%d/%m/%Y %H:%m:%s") as created, DATE_FORMAT(p.updated_at, "%d/%m/%Y %H:%m:%s") as updated, GROUP_CONCAT(c.category SEPARATOR ", ") as categorias, i.image_path as image from posts p left join post_categories as pc on pc.pid = p.id left join categories as c on c.id = pc.cid left join images as i on i.owner_id = p.id group by p.id');
        // $$query->getResultArray());
        $posts = $query->getResultArray();
        // echo "<pre>";
        // print_r($posts);
        // echo "</pre>";exit; 
        $dash = [
            "usession" => $session,
            "posts" => $posts
        ];
        return view('posts_list', ['dash' => $dash ]);
    }
    public function saveCat()
    {
        // print_r($this->request->getPost());
        $rdata = $this->request->getPost();
        if ($this->request->isAJAX())
        {
            $session = session();
            
            $data = [
                'slug' => slugify($rdata['category']),
                'category' => $rdata['category']
            ];
            $db = db_connect();
            if(isset($rdata['cid'])) {
                // echo "if";
                $r = $db->table('categories')->update($data, ["id" => $rdata["cid"]]);
                $a = $rdata["cid"];
                $edit = true;
            } else {
                // echo "else";
                $r = $db->table('categories')->insert($data);
                $a = $db->insertID();
                $edit = false;
            }
            // print_r($db->insertID());
            $reg = $db->table('categories')->select('*')
                 ->where('id', $a)
                 ->limit(1)
                 ->get()->getResultArray();
            return json_encode(["res" => $r, "reg" => $reg, "edit" => $edit]);
        }
        
        // echo "Hey User : ".$session->get('name');
        // $dash = [
        //     "usession" => $session
        // ];
        // return view('posts_list', ['dash' => $dash ]);
        print_r("tesafdafsadfasd");
    }

    
    public function categoriesList()
    {
        $session = session();
        // echo "Hey User : ".$session->get('name');
        
        $db = db_connect();
        // $query = $db->query('SELECT pc.*, c.category, count(pc.cid) as "PostCount" FROM `post_categories` pc inner join categories as c on c.id = pc.cid inner join posts as p on p.id = pc.pid group by pc.cid');
        $query = $db->query('select c.*, count(pc.cid) as catCount from categories c left join post_categories as pc on pc.cid = c.id group by c.id order by c.id DESC');
        // $$query->getResultArray());
        $cats = $query->getResultArray();
        // echo "<pre>";
        // print_r($cats);
        // echo "</pre>";
        $dash = [
            "usession" => $session,
            "cats" => $cats
        ];
        return view('categories_list', ['dash' => $dash ]);
    }

}