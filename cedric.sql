create table cedric_doc  (
	departement varchar(100),
	etablissement varchar(100),
	commune varchar(100),
	reference varchar(100),
	date_signature date,
	type_document varchar(100),
	modification varchar(100),
	doc_id varchar(37),
	utilisateur varchar(37),
	primary key (doc_id)
);


