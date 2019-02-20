-- DDL (Data Definition Language)
drop table job_history;
drop table employees;
drop table jobs;
drop table departments;
drop table locations;
drop table countries;
drop table region;

create table region(
	region_id int primary key,
	region_name varchar(50)
);


create table countries(
	country_id int primary key,
	country_name varchar(50),
	region_id int,
	constraint fk_reg_id foreign key(region_id)
		references region(region_id)
);

create table locations(
	location_id int primary key,
	street_address varchar(50) not null,
	postal_code varchar(50),
	city varchar(50),
	state_province varchar(50),
	country_id int,
	constraint fk_country_key foreign key(country_id) 
				references countries(country_id)
);

create table departments(
	department_id int primary key,
	department_name varchar(50),
	location_id int,
	manager_id int,
	constraint fk_locations_key foreign key(location_id) 
					references locations(location_id)
);


create table jobs(
	jobs_id int primary key,
	job_title varchar(50),
	max_salary float,
	min_salary float
);


create table employees(
	employee_id int primary key,
	first_name varchar(50),
	last_name varchar(50),
	email varchar(60),
	phone_number varchar(60),
	hire_date date,
	salary float,
	commission_pct float,
	department_id int,
	constraint un_email_key unique(email),
	constraint fk_dept_key foreign key(department_id)
		references departments(department_id)
);

create table job_history(
	job_history_id int primary key,
	start_date date,
	end_date date,
	employee_id int, 
	department_id int,
	job_id int,
	constraint fk_employee_key foreign key(employee_id) 
		references employees(employee_id),
	constraint fk_department_key foreign key(department_id)
		references departments(department_id),
	constraint fk_jobs_key foreign key(job_id)
		references jobs(jobs_id)
);



-- constraint => batasan
-- 1. primary key => not null, unique
-- 2. Foreign key => kunci tamu
-- 3. Unique key => tidak boleh sama

-- DML (Data Manupulation Language)
-- Create
insert into region
(region_id, region_name)
values 
(1, 'Asia'),
(2, 'Australia'),
(3, 'Eropa'),
(4, 'Amerika');

insert into countries 
(country_id, country_name, region_id)
values
(1, 'INDONESIA', 1),
(2, 'Inggris', 3),
(3, 'Singapura', 1);

insert into locations 
(location_id, street_address, city, country_id)
values
(1, 'JL. Kamboja', 'jakarta selatan', 1),
(2, 'JL. LERP', 'Liverpool', 2);

insert into departments
(department_id, department_name, location_id, manager_id)
values
(1, 'Information technology', 2, null),
(2, 'Finance', 1, null);

insert into jobs
(jobs_id, job_title, max_salary, min_salary)
values
(1, 'manager finance', 30000, 15000),
(2, 'IT Developer', 15000, 5000),
(3, 'IT Support', 13000, 4000);

insert into employees
(employee_id, first_name, email, department_id)
values
(2, 'rizky', 'rizky@yahoo.com', 1),
(3, 'rizky', 'rizky2@yahoo.com', 1),
(4, 'nugroho', 'nugroho@yahoo.com', 2);

--update 
update departments 
	set manager_id = 4
where department_id = 2;

insert into job_history
(job_history_id, start_date, employee_id, department_id, job_id)
values
(1, now(), 4, 2, 1),
(2, now(), 2, 1, 2),
(3, now(), 3, 1, 2);

-- READ
select * from job_history;
select * from departments;
select * from locations;
select * from employees;
select * from region;
select * from countries;