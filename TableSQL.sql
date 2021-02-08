--Ajouter une clonne dans la table menuinfo550 

ALTER TABLE menuinfo550 ADD MenuMidi int;
alter table menuinfo550 alter column MenuMidi set default 0;

--creater la table tableip

create table tableip (
   ip varchar(15) PRIMARY KRY,
   num integer
);
