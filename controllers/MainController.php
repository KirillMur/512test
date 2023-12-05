<?php
declare(strict_types=1);

namespace controllers;

use helpers\RenderHelper;
use models\Transactions;
use PDOException;

include_once ('./views/index.php');
include_once ('./helpers/RenderHelper.php');
include_once ('./models/Transactions.php');


class MainController
{
    private string $view = "./views/index.php";

    /**
     * Fetches record data
     */
    public function getRecord(): void
    {
        $id = $_GET['id'] ?? null;

        if (!$id && !is_numeric($id)) {
            RenderHelper::render($this->view, ["result" => 'No get parameter provided!']);
        }

        try {
            $result = Transactions::getData((int)$id);
        } catch (PDOException $exception) {
            RenderHelper::render($this->view, [
                "result" => 'Error: cannot retrieve data from DB: ' . $exception->getMessage()
            ]);

            return;
        }

        if (!$result) {
            RenderHelper::render($this->view, ["result" => 'No data is found']);

            return;
        }

        RenderHelper::render($this->view, ["result" => json_encode(array_pop($result))]);
    }
}
