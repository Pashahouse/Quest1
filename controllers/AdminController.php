<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;


class AdminController extends Controller
{


    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Экспорт юзеров
     *

     */
    public function actionExport()
    {
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("QuestProject");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'E-mail')
            ->setCellValue('B1', 'Имя')
            ->setCellValue('C1', 'Фамилия')
            ->setCellValue('D1', 'Этап')
            ->setCellValue('E1', 'Вопрос')
            // ->setCellValue('F1', 'Спонсор баллы')
            // ->setCellValue('G1', 'Статус')
            // ->setCellValue('H1', 'Рейтинг')
            ->setCellValue('I1', 'Дата создания')
            ->setCellValue('J1', 'Дата обновления');
        $users = User::find()->all();
        $i = 2;
        foreach ($users as $user) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $user->email)
                ->setCellValue('B' . $i, $user->name)
                ->setCellValue('C' . $i, $user->surname)
                ->setCellValue('D' . $i, $user->last_stage)
                ->setCellValue('E' . $i, $user->last_question . ' / ' . Yii::$app->params['stages'][$user->last_stage])
                //->setCellValue('F' . $i, $user->sponsor_points)
                //->setCellValue('G' . $i, $user->status)
                //->setCellValue('H' . $i, $i - 1)
                ->setCellValue('I' . $i, $user->created)
                ->setCellValue('J' . $i, $user->updated);
            $i++;
        }

        $objPHPExcel->getActiveSheet()->setTitle('User list');
        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="users' . date('d.m.Y') . '.xls"');
        header('Cache-Control: max-age=0');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');

        exit;
    }
}
