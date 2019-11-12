/*
CREATE OR REPLACE VIEW mat_stats AS (
	SELECT * FROM ((SELECT m.id, m.departement, dp.nom as nom_dept, m.description, m.classe, c.nom as nom_clas, m.nom, m.semester,
	count(d.nom) as documents
	FROM matieres m, documents d, departements dp, classes c
	WHERE m.id = d.matiere and m.departement=dp.id and m.classe=c.id
	GROUP BY id, departement,nom_dept,classe,nom_clas,nom,description,semester
	order by nom
	)
	UNION
	(SELECT m.id, m.departement, dp.nom as nom_dept, m.description, m.classe, c.nom as nom_clas, m.nom, m.semester,
		0 as documents
	FROM matieres m, departements dp, classes c
	WHERE m.departement=dp.id and m.classe=c.id and m.id NOT IN (SELECT matiere
		from documents)
	GROUP BY id, departement,nom_dept,classe,nom_clas,nom,description,semester
	order by nom
	)) AS transition order by id
);*/

CREATE OR REPLACE VIEW mat_stats AS (
	SELECT m.id, m.departement, dp.nom as nom_dept, m.description, m.classe, c.nom as nom_clas, m.nom, m.semester,
	count(d.nom) as documents
	FROM matieres m, documents d, departements dp, classes c
	WHERE m.id = d.matiere and m.departement=dp.id and m.classe=c.id
	GROUP BY id, departement,nom_dept,classe,nom_clas,nom,description,semester
	order by nom
);

/*
CREATE OR REPLACE VIEW class_stats AS(
	SELECT * FROM ((SELECT c.id, d.id as dept_id, d.nom as departement,c.nom,c.description,c.photo,
		count(m.id) as matieres
	FROM
		classes c, departements d, matieres m
	WHERE c.id = m.classe and c.departement=d.id
	GROUP BY id,departement,nom,description,photo)
	UNION
	(SELECT c.id, d.id as dept_id, d.nom as departement,c.nom,c.description,c.photo,
		0 as matieres
	FROM
		classes c, departements d
	WHERE c.departement=d.id and c.id NOT IN (select distinct classe from matieres)
	GROUP BY id,departement,nom,description,photo)
	) AS transition2 order by id
);*/

CREATE OR REPLACE VIEW class_stats AS (
	SELECT c.id, d.id as dept_id, d.nom as departement,c.nom,c.description,c.photo,
		count(m.id) as matieres
	FROM
		classes c, departements d, matieres m
	WHERE c.id = m.classe and c.departement=d.id
	GROUP BY c.id,d.id,departement,nom,description,photo
);

CREATE OR REPLACE VIEW dept_stats AS(
	SELECT d.id, d.nom, d.description, d.photo,
		count(c.id) as classes, sum(m.id) as matieres
	FROM departements d, classes c, matieres m
	WHERE d.id = c.departement and d.id = m.departement
	GROUP BY id,nom,description,photo
);