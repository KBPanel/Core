<?php
    /**
     * Importe todas as atualizações de um arquivo de log de atualizações bruto para o banco de dados.
     * Funciona tanto para webhook quanto para getUpdates.
     *
     * Modifique $updates_log_file_path e $mysql_credentials abaixo!
     *
     * Requer PHP7+
     *
     * @todo Mover para a ferramenta CLI dedicada.
     */

    use KSeven\TelegramBot\DB;
    use KSeven\TelegramBot\Entities\Update;
    use KSeven\TelegramBot\Telegram;

    require __DIR__ . '/../vendor/autoload.php';

    // Este é o arquivo que contém as atualizações brutas.
    $updates_log_file_path = __DIR__ . '/updates.log';

    $mysql_credentials = [
        'host'     => 'localhost',
        'port'     => 3306, // optional
        'user'     => 'dbuser',
        'password' => 'dbpass',
        'database' => 'dbname',
    ];

    try {
        (new Telegram('1:A'))->enableMySql($mysql_credentials);

        $updates_log_file = new SplFileObject($updates_log_file_path);
        $updates_log_file->setFlags(SplFileObject::DROP_NEW_LINE | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY);

        foreach ($updates_log_file as $update_json) {
            if ($update_arr = json_decode($update_json, true)) {
                echo $update_json . PHP_EOL;

                $updates_data = array_filter($update_arr['result'] ?? [$update_arr]);
                foreach ($updates_data as $update_data) {
                    $update = new Update($update_data);
                    printf(
                        'Atualizar ID %d %s' . PHP_EOL,
                        $update->getUpdateId(),
                        DB::insertRequest($update) ? '(success)' : '(failed) ' . implode(' ', DB::getPdo()->errorInfo())
                    );
                }
            }
        }
    } catch (Throwable $e) {
        echo $e;
    }
