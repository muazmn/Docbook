<?php
class Flasher
{

    public static function setFlash($message = '"please insert appointment date 2 days from now')
    {
        $_SESSION['flash'] = [
            'message' => $message
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {

            echo '<input type="text" name="" id="appointmentFlasher" placeholder="' . $_SESSION['flash']['message'] . '" disabled>';

            unset($_SESSION['flash']);
        }
    }
    public static function flash2()
    {
        if (isset($_SESSION['flash'])) {

            echo "<div class='alert'>
            " . $_SESSION['flash']['message'] . "
        </div> ";

            unset($_SESSION['flash']);
        }
    }
    public static function searchingRecordFlash()
    {
        if (isset($_SESSION['flash'])) {

            echo "<h2 class='rpMsg'>" . $_SESSION["flash"]["message"] . "</h2> ";

            unset($_SESSION['flash']);
        }
    }
    public static function flash3()
    {
        if (isset($_SESSION['flash'])) {

            echo $_SESSION["flash"]["message"];

            unset($_SESSION['flash']);
        }
    }
}
