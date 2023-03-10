create table users(
    id  numeric,
    name varchar
);

insert into users values (1, 'Андрей');
insert into users values (2, 'Борис');
insert into users values (3, 'Анна');
insert into users values (4, 'Антон');
insert into users values (5, 'Максим');
insert into users values (6, 'Лена');

create table positions(
    id  numeric,
    name varchar
);

insert into positions values (1, 'Стажер');
insert into positions values (1, 'Техник');
insert into positions values (1, 'Специалист');
insert into positions values (1, 'Программист');

create table salaries(
    id  numeric,
    date date,
    user_id numeric,
    position_id numeric,
    salary numeric
);

insert into salaries values (1, '2001-01-01', 1, 4, 9500);
insert into salaries values (2, '2001-01-01', 2, 1, 500);
insert into salaries values (3, '2001-01-01', 3, 3, 4500);
insert into salaries values (4, '2001-01-01', 4, 3, 4000);
insert into salaries values (5, '2001-02-01', 5, 4, 7500);
insert into salaries values (6, '2001-02-01', 2, 2, 2000);
insert into salaries values (7, '2001-02-01', 6, null, 5000);
insert into salaries values (8, '2001-02-01', 6, 3, 0);


select user_id, s1.id, date , u.name as user_name, s1.salary
    from salaries s1
        inner join users u on u.id = s1.user_id
            inner join positions p on p.id = s1.position_id
                where s1.position_id is not null and s1.salary <> 0
                      and  date = (
                            SELECT MAX(date)
                            FROM salaries s2
                            WHERE s1.user_id = s2.user_id
                        )
                order by s1.salary desc;