/* doadores */
DROP TABLE IF EXISTS doadores;
CREATE TABLE IF NOT EXISTS doadores (
    id INT AUTO_INCREMENT,
	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(), /* DATA CADASTRO */
    updated_at DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP(),
    
    nome VARCHAR(255),
    email VARCHAR(255),
    cpf VARCHAR(20),
    telefone VARCHAR(20),
    celular VARCHAR(20),
	datanascimento DATE,
	intervalodoacao INT, /* unico, bimestral, semestral, anual */
	valordoacao DECIMAL(15,2),
	formapagamento INT, /* debito, credito, */
    observacoes TEXT,
    
    PRIMARY KEY (id)
);


