<?php
require 'vendor/autoload.php';

$config = [
	'templates.path' => 'views'
];

$app = new \Slim\Slim($config);


$app->hook('slim.before', function () use ($app) {
  $req = $app->request;
  $host = $req->getHost();
  $port = $_SERVER['SERVER_PORT'] != 80 && $_SERVER['SERVER_PORT'] != 443 ? ':' . $_SERVER['SERVER_PORT'] : '';
  $root = $req->getRootUri();

  if($_SERVER['HTTP_HOST'] == "127.0.0.1" || $_SERVER['HTTP_HOST'] == "localhost"){
    $baseurl = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $host . $port . $root;
  }else{
    $baseurl = "https://". $host . $root;
  }
  
  $app->view()->appendData(array('baseurl' => $baseurl));
});


$app->get('(/:path+)/images/:file', function ($path, $file) use ($app) {
  $imagePath = '/views/images/' . $file;
  $fullPath = __DIR__ . $imagePath;

  if (file_exists($fullPath) && is_file($fullPath)) {
    $app->response->headers->set('Content-Type', mime_content_type($fullPath));
    readfile($fullPath);
  } else {
    $app->response->setStatus(404);
  }
});


$app->notFound(function () use ($app) {
  $app->render('404.php');
});

$app->get('/', function () use ($app) {
  $app->render('index.php');
});

$app->get('/message', function () use ($app) {
  $app->render('message_detail.php');
});

$app->get('/about', function () use ($app) {
  $app->render('about.php');
});

$app->get('/talk', function () use ($app) {
  $app->render('about_talk.php');
});

// $app->get('/chosen', function () use ($app) {
//   $app->render('chosen.php');
// });

$app->get('/chosen/:slug', function ($slug) use ($app) {
  $app->render('chosen.php', [
    'slug' => $slug,
  ]);
});

$app->get('/map', function () use ($app) {
  $app->render('map.php', array( 'now' => 'map' ));
});

$app->get('/message/:slug', function ($slug) use ($app) {
  $app->render('message_detail.php', [
    'slug' => $slug,
  ]);
});

$app->get('/message2/:slug', function ($slug) use ($app) {
  $app->render('message_detail2.php', [
    'slug' => $slug,
  ]);
});

$app->get('/message3/:slug', function ($slug) use ($app) {
  $app->render('message_detail3.php', [
    'slug' => $slug,
  ]);
});

$app->get('/news', function () use ($app) {
  $app->render('news.php', array( 'now' => 'news' ));
});

$app->get('/news(/:p)', function ($p = null) use ($app) {
  $app->render('news.php', [
    'p' => $p,
    'now' => 'news',
  ]);
})->conditions([
  'p' => '\d{1,2}',
]);

$app->get('/news/:slug', function ($slug) use ($app) {
  $app->render('news_detail.php', [
    'slug' => $slug,
    'now' => 'news',
  ]);
});

// $app->get('/cuisine', function () use ($app) {
//   $app->render('cuisine.php', array( 'now' => 'cuisine' ));
// });



$app->get('/sights', function () use ($app) {
  $app->render('sights.php');
});

$app->get('/sights/category/:slug', function ($slug) use ($app) {
  $app->render('cuisine.php', [
    'slug' => $slug,
    'now' => 'cuisine',
  ]);
});

$app->get('/sights/:slug', function ($slug) use ($app) {
  $app->render('cuisine_detail.php', [
    'slug' => $slug,
    'now' => 'cuisine',
  ]);
});

$app->get('/itinerary', function () use ($app) {
  $app->render('itinerary.php');
});

$app->get('/itinerary/:slug', function ($slug) use ($app) {
  $app->render('itinerary_detail.php', [
    'slug' => $slug,
  ]);
});

$app->get('/traffic', function () use ($app) {
  $app->render('traffic.php');
});

$app->get('/traffic/BusRoute', function () use ($app) {
  $app->render('traffic_detail1.php');
});

$app->get('/traffic/CarRoute', function () use ($app) {
  $app->render('traffic_detail2.php');
});

$app->get('/traffic/U-Bike', function () use ($app) {
  $app->render('traffic_detail3.php');
});

// $app->get('/search/:search', function ($search) use ($app) {
//   $app->render('search.php', array( 'txt' => $search ));
// });

$app->post("/search", function () use ($app) {
  $app->render('search.php', array( 'txt' => $_POST['search'] ));
});

// $app->get('/case(/:p)', function ($p = null) use ($app) {
//   $app->render('case.php', [
//     'p' => $p,
//   ]);
// })->conditions([
//   'p' => '\d{1,2}',
// ]);

// $app->get('/case/category/:slug(/:p)', function ($slug = null, $p = null) use ($app) {
//   $app->render('case_cat.php', [
//     'slug' => $slug,
//     'p' => $p,
//   ]);
// })->conditions([
//   'p' => '\d{1,2}',
// ]);

// $app->get('/case/category/:slug(/:city)(/:p)', function ($slug = null, $city = null, $p = null) use ($app) {
//   $app->render('case_cat.php', [
//     'slug' => $slug,
//     'city' => $city,
//     'p' => $p,
//   ]);
// })->conditions([
//   'p' => '\d{1,2}',
// ]);


// $app->get('/faq(/:slug)', function ($slug = null) use ($app) {
//   $app->render('faq.php', [
//     'slug' => $slug,
//   ]);
// });

// $app->get('/press/:slug', function ($slug) use ($app) {
//   $app->render('press_detail.php', [
//     'slug' => $slug,
//   ]);
// })->conditions([
//   'slug' => '.{2,}',
// ]);

$app->run();