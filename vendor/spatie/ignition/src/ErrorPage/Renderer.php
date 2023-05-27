<?php

namespace Spatie\Ignition\ErrorPage;

class Renderer
{
    /**
     * @param array<string, mixed> $data
     *
     * @return void
     */
<<<<<<< HEAD
    public function render(array $data, string $viewPath): void
    {
        $viewFile = $viewPath;
=======
    public function render(array $data): void
    {
        $viewFile = __DIR__ . '/../../resources/views/errorPage.php';
>>>>>>> e53e303c6cc827072ac019a4cb7508cf19c59ccf

        extract($data, EXTR_OVERWRITE);

        include $viewFile;
    }
<<<<<<< HEAD

    public function renderAsString(array $date, string $viewPath): string
    {
        ob_start();

        $this->render($date, $viewPath);

        return ob_get_clean();
    }
=======
>>>>>>> e53e303c6cc827072ac019a4cb7508cf19c59ccf
}
