/* doadores_enderecos */
DROP TABLE IF EXISTS doadores_enderecos;
CREATE TABLE IF NOT EXISTS doadores_enderecos (
    id INT AUTO_INCREMENT,
	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    updated_at DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP(),
    
	cep VARCHAR(9),
    logradouro VARCHAR(255),
    numero VARCHAR(10),
	complemento VARCHAR(30),
	bairro VARCHAR(50),
	cidade VARCHAR(50),    
	uf CHAR(2),    
    iddoador INT, 
    
    PRIMARY KEY (id),
    FOREIGN KEY FK_id_doador (iddoador) REFERENCES doadores(id) ON DELETE CASCADE ON UPDATE CASCADE
);
