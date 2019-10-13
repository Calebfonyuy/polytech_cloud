CREATE OR REPLACE VIEW mat_stats AS (
	SELECT m.id, m.departement,dp.nom as nom_dept, m.description, m.classe, c.nom as nom_clas, m.nom, m.semester,
		count(d.nom) as documents
	FROM matieres m, documents d, departements dp, classes c
	WHERE m.id = d.matiere and m.departement=dp.id and m.classe=c.id
	GROUP BY id, departement,nom_dept,classe,nom_clas,nom,description,semester
	order by nom
);

CREATE OR REPLACE VIEW class_stats AS(
	SELECT c.id, d.nom as departement,c.nom,c.description,c.photo,
		count(s.id) as matieres, sum(s.documents) as documents
	FROM
		classes c, departements d, mat_stats s
	WHERE c.id = s.classe and c.departement=d.id
	GROUP BY id,departement,nom,description,photo
);

CREATE OR REPLACE VIEW dept_stats AS(
	SELECT d.id, d.nom, d.description, d.photo,
		count(s.id) as classes, sum(s.matieres) as matieres, sum(s.documents) as documents
	FROM departements d, class_stats s
	WHERE d.nom=s.departement
	GROUP BY id,nom,description,photo
);