mysql -h 127.0.0.1 -P 3306 -u reko -p


Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis placerat interdum. Duis nec neque nulla. Donec purus felis, cursus non tincidunt in, fringilla quis enim. Nam nec cursus turpis. Aenean in dolor varius, sagittis enim condimentum, venenatis quam. Aliquam dapibus urna vel neque mattis pellentesque. Aliquam tortor nunc, hendrerit pulvinar magna ac, pretium auctor tortor. Curabitur ullamcorper, odio eu dignissim blandit, nisl ante blandit leo, et egestas diam dolor in erat. Mauris fermentum vehicula urna, vel porta erat pellentesque eu. Donec odio lorem, mattis quis elit quis, blandit malesuada sapien. Nunc at nisi malesuada, interdum urna a, fringilla tortor. Maecenas at imperdiet neque, eget condimentum sem. Mauris sapien justo, accumsan nec sagittis nec, aliquet vitae tortor. Phasellus a lectus ac erat dignissim interdum sit amet a odio.Sed vitae sodales est. Etiam commodo ex nec metus consectetur, eu egestas tellus convallis. Sed eget purus metus. Sed ac risus a augue viverra aliquam sit amet a tortor. Integer vel neque est. Nulla condimentum metus ac mi ultrices, placerat gravida lorem dignissim. Vivamus ultricies arcu ut turpis pretium, ut viverra nibh posuere. Fusce tempor ex sapien, nec iaculis est pulvinar id. Ut suscipit, risus a sollicitudin eleifend, nisl enim sagittis ligula, a feugiat augue lacus vitae lacus. Ut elementum lacinia tempor. Nunc facilisis pharetra cursus.  Donec erat nulla, feugiat pretium magna ac, vulputate feugiat nunc. Praesent dolor turpis, fermentum a eros ac, varius condimentum nibh. Quisque vehicula ligula ut massa convallis mollis. Sed vitae venenatis lacus. Cras finibus mi et neque tempus sodales sit amet a libero. Phasellus dictum urna nibh, non laoreet leo eleifend eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur accumsan in velit at pulvinar. Pellentesque sit amet volutpat sapien, lobortis blandit urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.



drop table comentarios;
drop table imagenes;
drop table etiquetas;
drop table eventos;
/**drop table usuarios;*/




CREATE TABLE eventos(id int AUTO_INCREMENT primary key, titulo varchar(100) NOT NULL UNIQUE, lugar varchar(30), nombreOrg varchar(80), fecha date default ("2030/12/12"), texto longtext, eventImg varchar(100),  publicado boolean default(false));


insert into eventos(titulo, eventImg, lugar, nombreOrg, fecha, texto) values('Descubriendo Roma',  '../imgs/romaevent.jpg', 'ROMA', 'Amiee Betts', '2021/02/11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis placerat interdum. Duis nec neque nulla. Donec purus felis, cursus non tincidunt in, fringilla quis enim. Nam nec cursus turpis. Aenean in dolor varius, sagittis enim condimentum, venenatis quam. Aliquam dapibus urna vel neque mattis pellentesque. Aliquam tortor nunc, hendrerit pulvinar magna ac, pretium auctor tortor. Curabitur ullamcorper, odio eu dignissim blandit, nisl ante blandit leo, et egestas diam dolor in erat. Mauris fermentum vehicula urna, vel porta erat pellentesque eu. Donec odio lorem, mattis quis elit quis, blandit malesuada sapien. Nunc at nisi malesuada, interdum urna a, fringilla tortor. Maecenas at imperdiet neque, eget condimentum sem. Mauris sapien justo, accumsan nec sagittis nec, aliquet vitae tortor. Phasellus a lectus ac erat dignissim interdum sit amet a odio.Sed vitae sodales est. Etiam commodo ex nec metus consectetur, eu egestas tellus convallis. Sed eget purus metus. Sed ac risus a augue viverra aliquam sit amet a tortor. Integer vel neque est. Nulla condimentum metus ac mi ultrices, placerat gravida lorem dignissim. Vivamus ultricies arcu ut turpis pretium, ut viverra nibh posuere. Fusce tempor ex sapien, nec iaculis est pulvinar id. Ut suscipit, risus a sollicitudin eleifend, nisl enim sagittis ligula, a feugiat augue lacus vitae lacus. Ut elementum lacinia tempor. Nunc facilisis pharetra cursus.  Donec erat nulla, feugiat pretium magna ac, vulputate feugiat nunc. Praesent dolor turpis, fermentum a eros ac, varius condimentum nibh. Quisque vehicula ligula ut massa convallis mollis. Sed vitae venenatis lacus. Cras finibus mi et neque tempus sodales sit amet a libero. Phasellus dictum urna nibh, non laoreet leo eleifend eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur accumsan in velit at pulvinar. Pellentesque sit amet volutpat sapien, lobortis blandit urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.');

insert into eventos(titulo, eventImg, lugar, nombreOrg, fecha, texto) values('Descubriendo Londres', '../imgs/londresevent.jpg', 'LONDRES', 'Lina Morgan', '2021/10/12','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis placerat interdum. Duis nec neque nulla. Donec purus felis, cursus non tincidunt in, fringilla quis enim. Nam nec cursus turpis. Aenean in dolor varius, sagittis enim condimentum, venenatis quam. Aliquam dapibus urna vel neque mattis pellentesque. Aliquam tortor nunc, hendrerit pulvinar magna ac, pretium auctor tortor. Curabitur ullamcorper, odio eu dignissim blandit, nisl ante blandit leo, et egestas diam dolor in erat. Mauris fermentum vehicula urna, vel porta erat pellentesque eu. Donec odio lorem, mattis quis elit quis, blandit malesuada sapien. Nunc at nisi malesuada, interdum urna a, fringilla tortor. Maecenas at imperdiet neque, eget condimentum sem. Mauris sapien justo, accumsan nec sagittis nec, aliquet vitae tortor. Phasellus a lectus ac erat dignissim interdum sit amet a odio.Sed vitae sodales est. Etiam commodo ex nec metus consectetur, eu egestas tellus convallis. Sed eget purus metus. Sed ac risus a augue viverra aliquam sit amet a tortor. Integer vel neque est. Nulla condimentum metus ac mi ultrices, placerat gravida lorem dignissim. Vivamus ultricies arcu ut turpis pretium, ut viverra nibh posuere. Fusce tempor ex sapien, nec iaculis est pulvinar id. Ut suscipit, risus a sollicitudin eleifend, nisl enim sagittis ligula, a feugiat augue lacus vitae lacus. Ut elementum lacinia tempor. Nunc facilisis pharetra cursus.  Donec erat nulla, feugiat pretium magna ac, vulputate feugiat nunc. Praesent dolor turpis, fermentum a eros ac, varius condimentum nibh. Quisque vehicula ligula ut massa convallis mollis. Sed vitae venenatis lacus. Cras finibus mi et neque tempus sodales sit amet a libero. Phasellus dictum urna nibh, non laoreet leo eleifend eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur accumsan in velit at pulvinar. Pellentesque sit amet volutpat sapien, lobortis blandit urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.');

insert into eventos(titulo, eventImg, lugar, nombreOrg, fecha, texto) values('Descubriendo Lyon', '../imgs/lyonevent.jpg', 'LYON', 'Tim Lee ', '2021/09/01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis placerat interdum. Duis nec neque nulla. Donec purus felis, cursus non tincidunt in, fringilla quis enim. Nam nec cursus turpis. Aenean in dolor varius, sagittis enim condimentum, venenatis quam. Aliquam dapibus urna vel neque mattis pellentesque. Aliquam tortor nunc, hendrerit pulvinar magna ac, pretium auctor tortor. Curabitur ullamcorper, odio eu dignissim blandit, nisl ante blandit leo, et egestas diam dolor in erat. Mauris fermentum vehicula urna, vel porta erat pellentesque eu. Donec odio lorem, mattis quis elit quis, blandit malesuada sapien. Nunc at nisi malesuada, interdum urna a, fringilla tortor. Maecenas at imperdiet neque, eget condimentum sem. Mauris sapien justo, accumsan nec sagittis nec, aliquet vitae tortor. Phasellus a lectus ac erat dignissim interdum sit amet a odio.Sed vitae sodales est. Etiam commodo ex nec metus consectetur, eu egestas tellus convallis. Sed eget purus metus. Sed ac risus a augue viverra aliquam sit amet a tortor. Integer vel neque est. Nulla condimentum metus ac mi ultrices, placerat gravida lorem dignissim. Vivamus ultricies arcu ut turpis pretium, ut viverra nibh posuere. Fusce tempor ex sapien, nec iaculis est pulvinar id. Ut suscipit, risus a sollicitudin eleifend, nisl enim sagittis ligula, a feugiat augue lacus vitae lacus. Ut elementum lacinia tempor. Nunc facilisis pharetra cursus.  Donec erat nulla, feugiat pretium magna ac, vulputate feugiat nunc. Praesent dolor turpis, fermentum a eros ac, varius condimentum nibh. Quisque vehicula ligula ut massa convallis mollis. Sed vitae venenatis lacus. Cras finibus mi et neque tempus sodales sit amet a libero. Phasellus dictum urna nibh, non laoreet leo eleifend eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur accumsan in velit at pulvinar. Pellentesque sit amet volutpat sapien, lobortis blandit urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.');

insert into eventos(titulo, eventImg, lugar, nombreOrg, fecha, texto) values('Descubriendo Arizona','../imgs/arizonaevent.jpg' ,'ARIZONA' ,'Andreia Morgan','2021/07/12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis placerat interdum. Duis nec neque nulla. Donec purus felis, cursus non tincidunt in, fringilla quis enim. Nam nec cursus turpis. Aenean in dolor varius, sagittis enim condimentum, venenatis quam. Aliquam dapibus urna vel neque mattis pellentesque. Aliquam tortor nunc, hendrerit pulvinar magna ac, pretium auctor tortor. Curabitur ullamcorper, odio eu dignissim blandit, nisl ante blandit leo, et egestas diam dolor in erat. Mauris fermentum vehicula urna, vel porta erat pellentesque eu. Donec odio lorem, mattis quis elit quis, blandit malesuada sapien. Nunc at nisi malesuada, interdum urna a, fringilla tortor. Maecenas at imperdiet neque, eget condimentum sem. Mauris sapien justo, accumsan nec sagittis nec, aliquet vitae tortor. Phasellus a lectus ac erat dignissim interdum sit amet a odio.Sed vitae sodales est. Etiam commodo ex nec metus consectetur, eu egestas tellus convallis. Sed eget purus metus. Sed ac risus a augue viverra aliquam sit amet a tortor. Integer vel neque est. Nulla condimentum metus ac mi ultrices, placerat gravida lorem dignissim. Vivamus ultricies arcu ut turpis pretium, ut viverra nibh posuere. Fusce tempor ex sapien, nec iaculis est pulvinar id. Ut suscipit, risus a sollicitudin eleifend, nisl enim sagittis ligula, a feugiat augue lacus vitae lacus. Ut elementum lacinia tempor. Nunc facilisis pharetra cursus.  Donec erat nulla, feugiat pretium magna ac, vulputate feugiat nunc. Praesent dolor turpis, fermentum a eros ac, varius condimentum nibh. Quisque vehicula ligula ut massa convallis mollis. Sed vitae venenatis lacus. Cras finibus mi et neque tempus sodales sit amet a libero. Phasellus dictum urna nibh, non laoreet leo eleifend eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur accumsan in velit at pulvinar. Pellentesque sit amet volutpat sapien, lobortis blandit urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.');

insert into eventos(titulo, eventImg, lugar, nombreOrg, fecha, texto) values('Descubriendo San Francisco', '../imgs/sanfranciscoevent.jpg', 'SAN FRANCISCO','Fernando', '2021/10/01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis placerat interdum. Duis nec neque nulla. Donec purus felis, cursus non tincidunt in, fringilla quis enim. Nam nec cursus turpis. Aenean in dolor varius, sagittis enim condimentum, venenatis quam. Aliquam dapibus urna vel neque mattis pellentesque. Aliquam tortor nunc, hendrerit pulvinar magna ac, pretium auctor tortor. Curabitur ullamcorper, odio eu dignissim blandit, nisl ante blandit leo, et egestas diam dolor in erat. Mauris fermentum vehicula urna, vel porta erat pellentesque eu. Donec odio lorem, mattis quis elit quis, blandit malesuada sapien. Nunc at nisi malesuada, interdum urna a, fringilla tortor. Maecenas at imperdiet neque, eget condimentum sem. Mauris sapien justo, accumsan nec sagittis nec, aliquet vitae tortor. Phasellus a lectus ac erat dignissim interdum sit amet a odio.Sed vitae sodales est. Etiam commodo ex nec metus consectetur, eu egestas tellus convallis. Sed eget purus metus. Sed ac risus a augue viverra aliquam sit amet a tortor. Integer vel neque est. Nulla condimentum metus ac mi ultrices, placerat gravida lorem dignissim. Vivamus ultricies arcu ut turpis pretium, ut viverra nibh posuere. Fusce tempor ex sapien, nec iaculis est pulvinar id. Ut suscipit, risus a sollicitudin eleifend, nisl enim sagittis ligula, a feugiat augue lacus vitae lacus. Ut elementum lacinia tempor. Nunc facilisis pharetra cursus.  Donec erat nulla, feugiat pretium magna ac, vulputate feugiat nunc. Praesent dolor turpis, fermentum a eros ac, varius condimentum nibh. Quisque vehicula ligula ut massa convallis mollis. Sed vitae venenatis lacus. Cras finibus mi et neque tempus sodales sit amet a libero. Phasellus dictum urna nibh, non laoreet leo eleifend eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur accumsan in velit at pulvinar. Pellentesque sit amet volutpat sapien, lobortis blandit urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.');





CREATE TABLE etiquetas(idEvento int, etiqueta varchar(100), foreign key (idEvento) references eventos(id));


insert into etiquetas(idEvento, etiqueta) values('1','viajes');

insert into etiquetas(idEvento, etiqueta) values('1','amigos');

insert into etiquetas(idEvento, etiqueta) values('1','idiomas');

insert into etiquetas(idEvento, etiqueta) values('1','experiencias');

insert into etiquetas(idEvento, etiqueta) values('2','viajes');

insert into etiquetas(idEvento, etiqueta) values('2','amigos');

insert into etiquetas(idEvento, etiqueta) values('2','idiomas');

insert into etiquetas(idEvento, etiqueta) values('2','experiencias');

insert into etiquetas(idEvento, etiqueta) values('3','viajes');

insert into etiquetas(idEvento, etiqueta) values('3','amigos');

insert into etiquetas(idEvento, etiqueta) values('3','idiomas');

insert into etiquetas(idEvento, etiqueta) values('3','experiencias');




create table imagenes(idEvento int, direccion varchar(200), nombreImg varchar(100) default("Unknown"), autorImg varchar(100) default("Unknown"), titulo varchar(200) default("Unknown"), foreign key (idEvento) references eventos(id));


insert into imagenes(idEvento, direccion, titulo) values('1','../imgs/romabanner.jpg', 'banner');

insert into imagenes(idEvento, direccion, nombreImg, autorImg, titulo) values('1','../imgs/romaimg1.jpg', 'Piazza Venezia', 'Fernando Lojano', 'img1');

insert into imagenes(idEvento, direccion, nombreImg, autorImg, titulo) values('1','../imgs/romaimg2.jpg', 'Fontana di Trevi', 'Andreia Moreira', 'img2');



insert into imagenes(idEvento, direccion, titulo) values('2','../imgs/londresbanner.jpg', 'banner');

insert into imagenes(idEvento, direccion, nombreImg, autorImg, titulo) values('2','../imgs/londresimg1.jpg', 'Tower Bridge', 'Samuel Wölfl', 'img1');

insert into imagenes(idEvento, direccion, nombreImg, autorImg, titulo) values('2','../imgs/londresimg2.jpg', 'Big Ben Tower', 'Joanna Zduńczyk', 'img2');



insert into imagenes(idEvento, direccion, titulo) values('3','../imgs/lyonbanner.jpg', 'banner');

insert into imagenes(idEvento, direccion, nombreImg, autorImg, titulo) values('3','../imgs/lyonimg1.jpg', 'Fête des Lumières', 'Bastien', 'img1');

insert into imagenes(idEvento, direccion, nombreImg, autorImg, titulo) values('3','../imgs/lyonimg2.jpg', 'Fête des Lumières', 'Fernando', 'img2');



insert into imagenes(idEvento, direccion, titulo) values('4','../imgs/arizonabanner.jpg', 'banner');



insert into imagenes(idEvento, direccion, titulo) values('5','../imgs/sanfranciscobanner.jpg', 'banner');

insert into imagenes(idEvento, direccion, nombreImg, autorImg, titulo) values('5','../imgs/sanfranciscoimg1.jpg', 'Golden Gate Bridge', 'Griffin Wooldridge', 'img1');

insert into imagenes(idEvento, direccion, nombreImg, autorImg, titulo) values('5','../imgs/sanfranciscoimg2.jpg', 'San Francisco at Night', 'Kehn Hermano', 'img2');







create table comentarios(idCom int AUTO_INCREMENT primary key, nombreEvento varchar(100), email varchar(100), idEvento int, tituloCom varchar(100), autor varchar(100), fechaPublicado date default ("2030/12/12"), textoComentario longtext, modificado boolean default(false), foreign key(idEvento) references eventos(id));




insert into comentarios(idEvento, tituloCom, autor, email, fechaPublicado, textoComentario, nombreEvento) values('1','Amazing place!','Emma Watts', 'emma@cuvox.de', '2018/03/12', 'I really enjoyed the place and all the experience and the people I meet there makes me believe that this event is the best!', 'Descubriendo Roma');


insert into comentarios(idEvento, tituloCom, autor, email, fechaPublicado, textoComentario, nombreEvento) values('1','The city is dirty','Tim Lee', 'tim@cuvox.de', '2018/02/14', 'The time I spent there the city was full of trash, that made the trip less joyful.', 'Descubriendo Roma');



insert into comentarios(idEvento, tituloCom, autor, email, fechaPublicado, textoComentario, nombreEvento) values('2','Amazing place!','Emma Watts', 'emma@cuvox.de', '2018/03/12', 'I really enjoyed the place and all the experience and the people I meet there makes me believe that this event is the best!', 'Descubriendo Londres');


insert into comentarios(idEvento, tituloCom, autor, email, fechaPublicado, textoComentario, nombreEvento) values('2','The city is dirty','Tim Lee', 'tim@cuvox.de', '2018/02/14', 'The time I spent there the city was full of trash, that made the trip less joyful.', 'Descubriendo Londres');



insert into comentarios(idEvento, tituloCom, autor, email, fechaPublicado, textoComentario, nombreEvento) values('3','Amazing place!','Emma Watts', 'emma@cuvox.de', '2018/03/12', 'I really enjoyed the place and all the experience and the people I meet there makes me believe that this event is the best!', 'Descubriendo Lyon');


insert into comentarios(idEvento, tituloCom, autor, email, fechaPublicado, textoComentario, nombreEvento) values('3','The city is dirty','Tim Lee', 'tim@cuvox.de', '2018/02/14', 'The time I spent there the city was full of trash, that made the trip less joyful.', 'Descubriendo Lyon');



insert into comentarios(idEvento, tituloCom, autor, email, fechaPublicado, textoComentario, nombreEvento) values('5','Amazing place!','Emma Watts', 'emma@cuvox.de', '2018/03/12', 'I really enjoyed the place and all the experience and the people I meet there makes me believe that this event is the best!','Descubriendo San Francisco');


insert into comentarios(idEvento, tituloCom, autor, email, fechaPublicado, textoComentario, nombreEvento) values('5','The city is dirty','Tim Lee','tim@cuvox.de' ,'2018/02/14', 'The time I spent there the city was full of trash, that made the trip less joyful.','Descubriendo San Francisco');





create table usuarios( id int AUTO_INCREMENT primary key, username varchar(100) NOT NULL, email varchar(100), password varchar(200), tipoUsuario varchar(100));




