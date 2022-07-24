<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220724122443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE departments DROP CONSTRAINT fk_faculties_department');
        $this->addSql('ALTER TABLE programmes DROP CONSTRAINT fk_departments_programme');
        $this->addSql('ALTER TABLE companies DROP CONSTRAINT fk_company_categories_company');
        $this->addSql('ALTER TABLE students DROP CONSTRAINT fk_programmes_student');
        $this->addSql('ALTER TABLE addresses DROP CONSTRAINT fk_students_address');
        $this->addSql('ALTER TABLE students DROP CONSTRAINT fk_levels_student');
        $this->addSql('DROP SEQUENCE company_categories_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE companies_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE faculties_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE departments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE programmes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE levels_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE students_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE addresses_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users (id BYTEA NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, is_banned BOOLEAN NOT NULL, is_verified BOOLEAN NOT NULL, google_id VARCHAR(255) DEFAULT NULL, github_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9F85E0677 ON users (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('COMMENT ON COLUMN users.id IS \'(DC2Type:uuid_binary)\'');
        $this->addSql('DROP TABLE faculties');
        $this->addSql('DROP TABLE departments');
        $this->addSql('DROP TABLE company_categories');
        $this->addSql('DROP TABLE companies');
        $this->addSql('DROP TABLE programmes');
        $this->addSql('DROP TABLE students');
        $this->addSql('DROP TABLE levels');
        $this->addSql('DROP TABLE addresses');
        $this->addSql('DROP TABLE users_go');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE company_categories_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE companies_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE faculties_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE departments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE programmes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE levels_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE students_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE addresses_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE faculties (id BIGSERIAL NOT NULL, uuid CHAR(36) DEFAULT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, name TEXT DEFAULT NULL, code TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_faculties_deleted_at ON faculties (deleted_at)');
        $this->addSql('CREATE TABLE departments (id BIGSERIAL NOT NULL, faculty_id BIGINT DEFAULT NULL, uuid CHAR(36) DEFAULT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, name TEXT DEFAULT NULL, code SMALLINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_departments_deleted_at ON departments (deleted_at)');
        $this->addSql('CREATE UNIQUE INDEX idx_departments_name ON departments (name)');
        $this->addSql('CREATE UNIQUE INDEX idx_departments_code ON departments (code)');
        $this->addSql('CREATE INDEX IDX_16AEB8D4680CAB68 ON departments (faculty_id)');
        $this->addSql('CREATE TABLE company_categories (id BIGSERIAL NOT NULL, uuid CHAR(36) DEFAULT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, name TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_company_categories_deleted_at ON company_categories (deleted_at)');
        $this->addSql('CREATE UNIQUE INDEX idx_company_categories_name ON company_categories (name)');
        $this->addSql('CREATE TABLE companies (id BIGSERIAL NOT NULL, company_category_id BIGINT DEFAULT NULL, uuid CHAR(36) DEFAULT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, name TEXT DEFAULT NULL, description TEXT DEFAULT NULL, "Website" TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_companies_deleted_at ON companies (deleted_at)');
        $this->addSql('CREATE UNIQUE INDEX idx_companies_name ON companies (name)');
        $this->addSql('CREATE INDEX IDX_8244AA3AB97257A ON companies (company_category_id)');
        $this->addSql('CREATE TABLE programmes (id BIGSERIAL NOT NULL, department_id BIGINT DEFAULT NULL, uuid CHAR(36) DEFAULT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, name TEXT DEFAULT NULL, slug SMALLINT DEFAULT NULL, duration TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX idx_programmes_name ON programmes (name)');
        $this->addSql('CREATE UNIQUE INDEX idx_programmes_slug ON programmes (slug)');
        $this->addSql('CREATE INDEX idx_programmes_deleted_at ON programmes (deleted_at)');
        $this->addSql('CREATE INDEX IDX_3631FC3FAE80F5DF ON programmes (department_id)');
        $this->addSql('CREATE TABLE students (id BIGSERIAL NOT NULL, level_id BIGINT DEFAULT NULL, programme_id BIGINT DEFAULT NULL, uuid CHAR(36) DEFAULT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, stno TEXT DEFAULT NULL, indexno TEXT DEFAULT NULL, custom_id TEXT DEFAULT NULL, first_name TEXT DEFAULT NULL, last_name TEXT DEFAULT NULL, other_name TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX idx_students_indexno ON students (indexno)');
        $this->addSql('CREATE UNIQUE INDEX idx_students_custom_id ON students (custom_id)');
        $this->addSql('CREATE UNIQUE INDEX idx_students_stno ON students (stno)');
        $this->addSql('CREATE INDEX idx_students_deleted_at ON students (deleted_at)');
        $this->addSql('CREATE INDEX IDX_A4698DB262BB7AEE ON students (programme_id)');
        $this->addSql('CREATE INDEX IDX_A4698DB25FB14BA7 ON students (level_id)');
        $this->addSql('CREATE TABLE levels (id BIGSERIAL NOT NULL, uuid CHAR(36) DEFAULT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, name TEXT DEFAULT NULL, slug TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX idx_levels_name ON levels (name)');
        $this->addSql('CREATE UNIQUE INDEX idx_levels_slug ON levels (slug)');
        $this->addSql('CREATE INDEX idx_levels_deleted_at ON levels (deleted_at)');
        $this->addSql('CREATE TABLE addresses (id BIGSERIAL NOT NULL, student_id BIGINT DEFAULT NULL, uuid CHAR(36) DEFAULT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, addresses TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_addresses_deleted_at ON addresses (deleted_at)');
        $this->addSql('CREATE INDEX IDX_6FCA7516CB944F1A ON addresses (student_id)');
        $this->addSql('CREATE TABLE users_go (id BIGSERIAL NOT NULL, uuid CHAR(36) DEFAULT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, name TEXT DEFAULT NULL, email TEXT DEFAULT NULL, password TEXT DEFAULT NULL, is_verified BOOLEAN DEFAULT NULL, level BIGINT DEFAULT NULL, status BIGINT DEFAULT NULL, role SMALLINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_users_deleted_at ON users_go (deleted_at)');
        $this->addSql('CREATE UNIQUE INDEX users_email_key ON users_go (email)');
        $this->addSql('ALTER TABLE departments ADD CONSTRAINT fk_faculties_department FOREIGN KEY (faculty_id) REFERENCES faculties (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE companies ADD CONSTRAINT fk_company_categories_company FOREIGN KEY (company_category_id) REFERENCES company_categories (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE programmes ADD CONSTRAINT fk_departments_programme FOREIGN KEY (department_id) REFERENCES departments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT fk_programmes_student FOREIGN KEY (programme_id) REFERENCES programmes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT fk_levels_student FOREIGN KEY (level_id) REFERENCES levels (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE addresses ADD CONSTRAINT fk_students_address FOREIGN KEY (student_id) REFERENCES students (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE users');
    }
}
