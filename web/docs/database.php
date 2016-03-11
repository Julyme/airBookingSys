//创建数据库

//创建user数据表
create table user
(
   user_id         int(16)      primary key not null auto_increment,
   acount     varchar(32),
   name       varchar(32)  not null,
   password   varchar(32)  not null,
   sex        tinyint(1)   not null,
   address    varchar(128) not null,
   phone      varchar(16)  not null,
   email      varchar(32)  not null,
   idcard     varchar(32)  not null,
   iscontact  boolean      not null
)

//创建administrator数据表
create table administrator
(
   id         int(16)      primary key not null auto_increment,
   name       varchar(32)  not null,
   password   varchar(32)  not null,
   sex        tinyint(1)   not null,
   address    varchar(128) not null,
   phone      int(11)      not null,
   email      varchar(32)  not null,
   idcard     varchar(32)  not null,
   staffid    int(4)       not null
)

//创建orders数据表
create table orders
(
   order_id        int(16)      primary key not null auto_increment,
   comsumer_name   varchar(32)  not null,
   user_id         int(16)      not null, 
   ticket_id       int(16)      not null,
   level           tinyint(1)   not null
)

//创建ticket数据表
create table ticket
(
   ticket_id  int(16)      primary key not null auto_increment,
   fromcity   varchar(16)  not null,
   tocity     varchar(16)  not null,
   fromport   varchar(32)  not null,
   toport     varchar(32)  not null,
   fromdate   date         not null,
   todate     date         not null,
   fromtime   time         not null,
   totime     time         not null,
   price      int(8)       not null,
   tax        int(8)       not null,
   changenum  int(4)       not null,
   aircompany int(4)       not null,
   info       text         not null,
   number     int(8)       not null,
   isonsale   tinyint(1)   not null,
   ecoclass   int(16)      not null,
   busclass   int(16)      not null,
   firclass   int(16)      not null
)

//创建contacts数据表
create table contacts
(
   id           int(16)      primary key not null auto_increment,
   user_id    int(16)      not null,
   other_id     int(16)      not null
)