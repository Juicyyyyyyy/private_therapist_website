<?php

declare(strict_types=1);

namespace Framework;

abstract class Controller
{
    protected Request $request;
    protected Response $response;
    protected TemplateViewerInterface $viewer;

    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function setViewer(TemplateViewerInterface $viewer): void
    {
        $this->viewer = $viewer;
    }

    protected function view(string $template, array $data = []): Response
    {
        // Include authentication status in the view data
        $data['isAuthenticated'] = $this->isAuthenticated();
        $this->response->setBody($this->viewer->render($template, $data));

        return $this->response;
    }

    protected function redirect(string $url): Response
    {
        $this->response->redirect($url);
        return $this->response;
    }

    // Method to check if the user is authenticated
    protected function isAuthenticated(): bool
    {
        return isset($_SESSION['user_id']);
    }
}
