<?php

namespace D2App;
use Composer\Script\Event;


defined('YII_PATH') or define('YII_PATH', dirname(__FILE__).'/../../vendor/yiisoft/yii/framework');
defined('CONSOLE_CONFIG') or define('CONSOLE_CONFIG', dirname(__FILE__).'/../../vendor/uldisn/d2app/config/console.php');


//if (!is_file(CONSOLE_CONFIG)) {
//    throw new \Exception("File '".CONSOLE_CONFIG."' from CONSOLE_CONFIG not found!");
//}

class ComposerCallback
{
    /**
     * Displays welcome message
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function preInstall(Event $event)
    {
        $composer = $event->getComposer();
        echo self::d2appAscii();
        echo "Installing application...\n\n";

        self::runHook('pre-install');
    }

    /**
     * Executes ./yiic migrate
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function postInstall(Event $event)
    {
        self::runHook('post-install');
        echo "\nThank you for choosing D2App!\n\n";
    }

    /**
     * Displays welcome message
     *
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function preUpdate(Event $event)
    {
        echo self::d2appAscii();
        echo "Updating packages...\n\n";
        self::runHook('pre-update');
    }

    /**
     * Executes ./yiic migrate
     *
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function postUpdate(Event $event)
    {
        self::runHook('post-update');
        echo "\n";
    }

    /**
     * Executes ./yiic <vendor/<packageName>-<action>
     *
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function postPackageInstall(Event $event)
    {
        $installedPackage = $event->getOperation()->getPackage();
        $hookName = $installedPackage->getPrettyName().'-install';
        self::runHook($hookName);
    }

    /**
     * Executes ./yiic <vendor/<packageName>-<action>
     *
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function postPackageUpdate(Event $event)
    {
        $installedPackage = $event->getOperation()->getTargetPackage();
        $hookName = $installedPackage->getPrettyName().'-update';
        self::runHook($hookName);
    }

    /**
     * Asks user to confirm by typing y or n.
     *
     * Credits to Yii CConsoleCommand
     *
     * @param string $message to echo out before waiting for user input
     * @return bool if user confirmed
     */
    public static function confirm($message)
    {
        echo $message . ' [yes|no] ';
        return !strncasecmp(trim(fgets(STDIN)), 'y', 1);
    }


    /**
     * Runs Yii command, if available (defined in config/console.php)
     */
    private static function runHook($name){
        $app = self::getYiiApplication();
        if ($app === null) return;

        if (isset($app->params['composer.callbacks'][$name])) {
            echo "composer.callback: " . $name . "\n\n";
            $cmd = $app->params['composer.callbacks'][$name];

            // check for multiple commands
            if (is_array($cmd[0])) {
                foreach ($cmd AS $args) {
                    $app->commandRunner->addCommands(\Yii::getPathOfAlias('system.cli.commands'));
                    $app->commandRunner->run($args);
                }
            } else {
                $args = $cmd;
                $app->commandRunner->addCommands(\Yii::getPathOfAlias('system.cli.commands'));
                $app->commandRunner->run($args);
            }
        }
    }

    /**
     * Creates console application, if Yii is available
     */
    private static function getYiiApplication()
    {
        if (!is_file(YII_PATH.'/yii.php'))
        {
            return null;
        }

        require_once(YII_PATH . '/yii.php');
        spl_autoload_register(array('YiiBase', 'autoload'));

        if (\Yii::app() === null) {
            if (is_file(CONSOLE_CONFIG)) {
                $app = \Yii::createConsoleApplication(CONSOLE_CONFIG);
            } else {
                throw new \Exception("File from CONSOLE_CONFIG not found");   
            }            
        } else {
            $app = \Yii::app();
        }
        return $app;
    }

    private static function d2appAscii(){
        $return = <<<TXT
*************
* D 2 A p p *                
*************
TXT;
        $return .= "\n";
        return $return;
    }

}
