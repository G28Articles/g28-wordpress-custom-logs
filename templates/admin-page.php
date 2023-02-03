<?php

use G28\CustomLogs\Logger;

$files          = logger::getInstance()->getLogFiles();
[ $currentFile, $logContent ] = Logger::getInstance()->getLogFileContent( $files[0] );


?>
<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <div class="log-container">
        <div class="log-select-wrapper">
            <label for="logFiles">Arquivos de log: </label>
            <select id="logFiles" name="logFiles">
                <?php foreach ($files as $file) { ?>
                    <option value="<?php echo $file?>"><?php echo $file ?></option>
                <?php } ?>
            </select>
            <span id="loadingLogs" style="display: none; padding-left: 15px;">
                <img src="<?php echo esc_url( get_admin_url() . 'images/spinner.gif' ); ?>"  alt="loading"/>
            </span>
        </div>

        <div id="logFileContent" class="log-content">
            <?php echo $logContent ?>
        </div>
    </div>
</div>