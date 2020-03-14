/* formas_pagamento */
DROP TABLE IF EXISTS formas_pagamento;
CREATE TABLE IF NOT EXISTS formas_pagamento (
    id INT AUTO_INCREMENT,
	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    updated_at DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP(),
    
	nome VARCHAR(30),
    observacoes VARCHAR(255),
    
    situacao INT, /* ativa/inativa/etc */

	PRIMARY KEY (id)
);

INSERT INTO formas_pagamento (nome, observacoes, situacao) VALUES ('Débito', '', 1); 
INSERT INTO formas_pagamento (nome, observacoes, situacao) VALUES ('Crédito', '', 1); 
INSERT INTO formas_pagamento (nome, observacoes, situacao) VALUES ('Boleto', '', 0); 


