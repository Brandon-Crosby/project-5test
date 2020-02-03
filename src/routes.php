<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Comments;
use App\Post;

//routes

//Display Home Page

return function(App $app){
  $container = $app->getContainer();

$app->get('/', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/' route");
    $container->get('logger')->info("Slim-Skeleton / route")
    $posts = Post::all();
    $args['posts'] = $posts;
return $this->view->render($response, 'home.twig', $args);

    // Render index view
    //return $this->renderer->render($response, 'index.twig',$args);
    });
  };
/*
$app->get('/', function ($request, $response, $args) {
    //$this->logger->info("index'/' route");
    $post = new Post ($this->db);
    //Calls get posts method
    $results = $post->getPosts();
    $args['posts'] = $results;
    // Render index view
    return $this->view->render($response, 'index.twig', $args);
});
*/
