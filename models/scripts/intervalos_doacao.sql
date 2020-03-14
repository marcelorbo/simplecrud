/* intervalos_doacao */
DROP TABLE IF EXISTS intervalos_doacao;
CREATE TABLE IF NOT EXISTS intervalos_doacao (
    id INT AUTO_INCREMENT,
	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    updated_at DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP(),
    
	nome VARCHAR(30),
    observacoes VARCHAR(255),
    situacao INT, /* ativa/inativa/etc */

	PRIMARY KEY (id)
);


/* INSERT */
INSERT INTO intervalos_doacao (nome, observacoes, situacao) VALUES ('Única', '', 1); 
INSERT INTO intervalos_doacao (nome, observacoes, situacao) VALUES ('Bimestral', '', 1); 
INSERT INTO intervalos_doacao (nome, observacoes, situacao) VALUES ('Semestral', '', 1); 
INSERT INTO intervalos_doacao (nome, observacoes, situacao) VALUES ('Anual', '', 1); 
INSERT INTO intervalos_doacao (nome, observacoes, situacao) VALUES ('Mensal', '', 0); 

