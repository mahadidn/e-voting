<?php

use Klp12\Evoting\App\Router;
use Klp12\Evoting\Config\Database;
use Klp12\Evoting\Controller\AdminController;
use Klp12\Evoting\Controller\HomeController;
use Klp12\Evoting\Controller\UserController;
use Klp12\Evoting\Middleware\MustLoginAdminMiddleware;
use Klp12\Evoting\Middleware\MustLoginUserMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

Database::getConnection("prod");

// Home Controller
Router::add('GET', '/', HomeController::class, 'index', []);
Router::add('GET', '/quick-count', HomeController::class, 'quickCount', []);
Router::add('GET', '/kandidat', HomeController::class, 'kandidat', []);

// Admin Controller
Router::add('GET', '/login/admin', AdminController::class, 'login', []);
Router::add('POST', '/login/admin', AdminController::class, 'postLogin', []);
Router::add('GET', '/beranda/admin', AdminController::class, 'beranda', [MustLoginAdminMiddleware::class]);
Router::add('GET', '/admin/logout', AdminController::class, 'logout', [MustLoginAdminMiddleware::class]);
// admin service
Router::add('GET', '/data/pemilih', AdminController::class, 'dataPemilih', [MustLoginAdminMiddleware::class]);
Router::add('GET', '/data/kandidat', AdminController::class, 'dataKandidat', [MustLoginAdminMiddleware::class]);
Router::add('GET', '/data/kandidat/tambah', AdminController::class, 'dataKandidatTambah', [MustLoginAdminMiddleware::class]);
Router::add('POST', '/data/kandidat/tambah', AdminController::class, 'postDataKandidatTambah', [MustLoginAdminMiddleware::class]);
Router::add('POST', '/data/pengguna/tambah', AdminController::class, 'postDataPenggunaTambah', [MustLoginAdminMiddleware::class]);
Router::add('GET', '/data/kandidat/edit/([0-9]*)', AdminController::class, 'dataKandidatEdit', [MustLoginAdminMiddleware::class]);
Router::add('GET', '/data/pengguna/hapus/([0-9]*)', AdminController::class, 'dataPenggunaHapus', [MustLoginAdminMiddleware::class]);
Router::add('GET', '/data/pengguna/edit/([0-9]*)', AdminController::class, 'dataPenggunaEdit', [MustLoginAdminMiddleware::class]);
Router::add('POST', '/data/pengguna/edit/([0-9]*)', AdminController::class, 'postDataPenggunaEdit', [MustLoginAdminMiddleware::class]);
Router::add('GET', '/data/voting', AdminController::class, 'dataVoting', [MustLoginAdminMiddleware::class]);
Router::add('GET', '/data/rekapitulasivoting', AdminController::class, 'dataRekapitulasiVoting', [MustLoginAdminMiddleware::class]);
Router::add('GET', '/data/pengguna', AdminController::class, 'dataPengguna', [MustLoginAdminMiddleware::class]);
Router::add('GET', '/admin/gantipassword', AdminController::class, 'gantiPassword', [MustLoginAdminMiddleware::class]);
Router::add('GET', '/data/pengguna/tambah', AdminController::class, 'dataPenggunaTambah', [MustLoginAdminMiddleware::class]);

// User Controller
Router::add('GET', '/login/pemilih', UserController::class, 'login', []);
Router::add('POST', '/login/pemilih', UserController::class, 'postLogin', []);
Router::add('GET', '/register', UserController::class, 'register', []);
Router::add('POST', '/register', UserController::class, 'postRegister', []);
Router::add('GET', '/beranda/user', UserController::class, 'halamanUser', [MustLoginUserMiddleware::class]);
Router::add('GET', '/user/logout', UserController::class, 'logout', [MustLoginUserMiddleware::class]);

Router::run();