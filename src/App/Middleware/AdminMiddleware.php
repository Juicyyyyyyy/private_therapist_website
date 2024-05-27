<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Request;
use Framework\Response;
use Framework\RequestHandlerInterface;
use Framework\MiddlewareInterface;
use App\Models\User;

class AdminMiddleware implements MiddlewareInterface
{
    public function __construct(private User $userModel)
    {
    }

    public function process(Request $request, RequestHandlerInterface $next): Response
    {
        $request->post = array_map("trim", $request->post);

        $response = $next->handle($request);

        return $response;
    }

    public function handle(Request $request, Response $response, callable $next)
    {
        // Check if user is authenticated
        if (!isset($_SESSION['user_id'])) {
            return $response->redirect('/login');
        }

        // Check if user is admin
        $userId = $_SESSION['user_id'];
        if (!$this->userModel->isAdmin($userId)) {
            return $response->redirect('/unauthorized');
        }

        // Proceed to the next middleware or controller action
        return $next($request, $response);
    }
}