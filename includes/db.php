<?php
function conectarBanco() {
    $db = new SQLite3(__DIR__ . '/../db/database.sqlite');

    // Cria a tabela se não existir
    $db->exec("CREATE TABLE IF NOT EXISTS registros (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        quantidade INTEGER NOT NULL,
        observacao TEXT,
        data_registro DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    return $db;
}
