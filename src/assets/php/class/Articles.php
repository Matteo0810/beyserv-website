<?php

    namespace App\Classes; 

    class Articles {

        /**
         * @param $array alls params of article
         */
        private $_title, $_content, $_author, $_date, $_img;

        public function __construct($array) {
            if (!isset($array) || !is_array($array)) echo "Array non initilisée";
            $this->_title = $array['title'];
            $this->_content = $array['content'];
            $this->_author = $array['author'];
            $this->_date = $array['date'];
            $this->_img = $array['img'];
        }

        //post an article
        public function POSTArticle() {
            try {
                include '../BDD.php';
                $req = $db->prepare('INSERT INTO articles(title, content, image, author, published_date) VALUES (:title, :content, :image, :author, :published_date)');
                $req->execute(array('title' => $this->_title, 'content' => $this->_content, 'image' => $this->_img, 'author' => $this->_author, 'published_date' => $this->_date));
                echo '<span class="register_sucess">Article posté</span>';
            } catch (\Throwable $th) {echo $th;}
        }

    }