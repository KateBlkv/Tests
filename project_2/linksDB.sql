create database all_links;
use all_links;

create table if not exists tb_links
(
    id    int auto_increment primary key,
    long_link  varchar(255) not null,
    short_link varchar(50)  not null,
    ip varchar(50),
    data_time int,
    user_agent varchar(255)
    );
    
