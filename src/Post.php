<?php
namespace App;
use \PDO;

class Post
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getPost()
    {
        $statement = $this->db->prepare(
            'SELECT * FROM posts ORDER BY id'
        );
        $statement->execute();
        $Posts = $sql->fetchAll(PDO :: FETCH_ASSOC);
        //if (empty($Posts)) {
            //throw new ApiException(ApiException::post_NOT_FOUND, 404);
      //}
        return $Posts;
    }
    public function getPosts()
    {
        $sql = $this->db->prepare(
            'SELECT * FROM post WHERE id=:id'
        );
        $sql->bindParam('id', $post_id);
        $sql->execute();
        $Posts = $sql->fetch();
        //if (empty($post)) {
            //throw new ApiException(ApiException::post_NOT_FOUND, 404);
        //}
        return $post;
    }
    public function createPost($title, $date, $body)
    {
        //if (empty($data['title']) || empty($data['url'])) {
            //throw new ApiException(ApiException::Post_INFO_REQUIRED);
        //}
        $sql = $this->db->prepare(
            'INSERT INTO Posts(title, url) VALUES(:title, :url)'
        );
        $sql->bindParam('title', $data['title']);
        $sql->bindParam('url', $data['url']);
        $sql->execute();
        //if ($sql->rowCount()<1) {
        //    throw new ApiException(ApiException::Post_CREATION_FAILED);
        //}
        return $this->getPosts($this->db->lastInsertId());
    }
    public function updatePost($data)
    {
        if (empty($data['Post_id']) || empty($data['title']) || empty($data['url'])) {
          //  throw new ApiException(ApiException::Post_INFO_REQUIRED);
        }
        $statement = $this->database->prepare(
            'UPDATE courses SET title=:title, url=:url WHERE id=:id'
        );
        $statement->bindParam('title', $data['title']);
        $statement->bindParam('url', $data['url']);
        $statement->bindParam('id', $data['Post_id']);
        $statement->execute();
        if ($statement->rowCount()<1) {
            //throw new ApiException(ApiException::Post_UPDATE_FAILED);
        }
        return $this->get_Post($data['course_id']);
    }
    public function delete_Post($Post_id)
    {
        $this->getPosts($Post_id);
        $statement = $this->database->prepare(
            'DELETE FROM courses WHERE id=:id'
        );
        $statement->bindParam('id', $Post_id);
        $statement->execute();
        //if ($statement->rowCount()<1) {
            //throw new ApiException(ApiException::Post_DELETE_FAILED);
        //}
        return ['message' => 'The post was deleted'];
    }
}
