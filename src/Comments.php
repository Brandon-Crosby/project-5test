<?php
namespace App;
use \PDO;

class Comments
{
    protected $db;
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }
    /*public function getComments()
    {
        $statement = $this->db->prepare(
            'SELECT * FROM posts ORDER BY id'
        );
        $statement->execute();
        $Comments = $sql->fetchAll();
        //if (empty($Comments)) {
            //throw new ApiException(ApiException::comment_NOT_FOUND, 404);
        //}
        //return $Comments;
    }*/
    public function getComments($comment_id)
    {
        $sql = $this->db->prepare(
            'SELECT * FROM post WHERE id=:id'
        );
        $sql->bindParam('id', $comment_id);
        $sql->execute();
        $Comments = $sql->fetch();
        /*if (empty($comment)) {
            //throw new ApiException(ApiException::comment_NOT_FOUND, 404);
        }*/
        return $comment;
    }
    public function createComment($data)
    {
          /*if (empty($data['title']) || empty($data['url'])) {
            //throw new ApiException(ApiException::comment_INFO_REQUIRED);
        }*/
        $sql = $this->db->prepare(
            'INSERT INTO Comments(title, url) VALUES(:title, :url)'
        );
        $sql->bindParam('title', $data['title']);
        $sql->bindParam('url', $data['url']);
        $sql->execute();
        if ($sql->rowCount()<1) {
            //throw new ApiException(ApiException::comment_CREATION_FAILED);
        }
        return $this->getComments($this->db->lastInsertId());
    }
    public function updateComment($data)
    {
          /*if (empty($data['comment_id']) || empty($data['title']) || empty($data['url'])) {
            //throw new ApiException(ApiException::comment_INFO_REQUIRED);
        }*/
        $statement = $this->database->prepare(
            'UPDATE courses SET title=:title, url=:url WHERE id=:id'
        );
        $statement->bindParam('title', $data['title']);
        $statement->bindParam('url', $data['url']);
        $statement->bindParam('id', $data['comment_id']);
        $statement->execute();
        /*if ($statement->rowCount()<1) {
            //throw new ApiException(ApiException::comment_UPDATE_FAILED);
        }*/
        return $this->get_comment($data['comment_id']);
    }
    public function delete_Comment($comment_id)
    {
        $this->getComments($comment_id);
        $statement = $this->database->prepare(
            'DELETE FROM courses WHERE id=:id'
        );
        $statement->bindParam('id', $comment_id);
        $statement->execute();
        /*if ($statement->rowCount()<1) {
            //throw new ApiException(ApiException::comment_DELETE_FAILED);
        }*/
        return ['message' => 'The post was deleted'];
    }
}
