SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET search_path TO idez;
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;
CREATE SEQUENCE public.conta_empresarial_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
SET default_tablespace = '';
CREATE TABLE public.conta_empresarial (
    id smallint DEFAULT nextval('public.conta_empresarial_id_seq'::regclass) NOT NULL,
    agencia integer NOT NULL,
    numero bigint NOT NULL,
    digito integer NOT NULL,
    cnpj character varying(14) NOT NULL,
    nome_fantasia character varying(100),
    razao_social character varying(100),
    valor_depositado money,
    id_usuario integer NOT NULL
);
CREATE SEQUENCE public.conta_pessoal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
CREATE TABLE public.conta_pessoal (
    id smallint DEFAULT nextval('public.conta_pessoal_id_seq'::regclass) NOT NULL,
    agencia integer NOT NULL,
    numero bigint NOT NULL,
    digito integer NOT NULL,
    cpf character varying(11) NOT NULL,
    valor_depositado character varying(50),
    id_usuario integer NOT NULL
);
CREATE SEQUENCE public.historico_transacao_empresarial_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
CREATE TABLE public.historico_transacao_empresarial (
    id smallint DEFAULT nextval('public.historico_transacao_empresarial_id_seq'::regclass) NOT NULL,
    id_conta_empresarial integer NOT NULL,
    id_transacao integer NOT NULL,
    valor_transacao money NOT NULL
);
CREATE SEQUENCE public.historico_transacao_pessoal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
CREATE TABLE public.historico_transacao_pessoal (
    id smallint DEFAULT nextval('public.historico_transacao_pessoal_id_seq'::regclass) NOT NULL,
    id_conta_pessoal integer NOT NULL,
    id_transacao integer NOT NULL,
    valor_transacao money NOT NULL
);
CREATE SEQUENCE public.transacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
CREATE TABLE public.transacao (
    id smallint DEFAULT nextval('public.transacao_id_seq'::regclass) NOT NULL,
    tipo character varying(100)
);
CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
CREATE TABLE public.usuario (
    id smallint DEFAULT nextval('public.user_id_seq'::regclass) NOT NULL,
    nome character varying(100) NOT NULL,
    sobrenome character varying(100),
    cpf character varying(11) NOT NULL,
    telefone character varying(20),
    email character varying(50) NOT NULL,
    senha character varying(100) NOT NULL
);
ALTER TABLE ONLY public.conta_empresarial
    ADD CONSTRAINT conta_empresarial_cnpj_key UNIQUE (cnpj);
ALTER TABLE ONLY public.conta_empresarial
    ADD CONSTRAINT conta_empresarial_pkey PRIMARY KEY (id);
ALTER TABLE ONLY public.conta_pessoal
    ADD CONSTRAINT conta_pessoal_cpf_key UNIQUE (cpf);
ALTER TABLE ONLY public.conta_pessoal
    ADD CONSTRAINT conta_pessoal_pkey PRIMARY KEY (id);
ALTER TABLE ONLY public.historico_transacao_empresarial
    ADD CONSTRAINT historico_transacao_empresarial_pkey PRIMARY KEY (id);
ALTER TABLE ONLY public.historico_transacao_pessoal
    ADD CONSTRAINT historico_transacao_pessoal_pkey PRIMARY KEY (id);
ALTER TABLE ONLY public.transacao
    ADD CONSTRAINT transacao_pkey PRIMARY KEY (id);
ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_cpf_key UNIQUE (cpf);
ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);
ALTER TABLE ONLY public.conta_empresarial
    ADD CONSTRAINT conta_empresarial_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id);
ALTER TABLE ONLY public.conta_pessoal
    ADD CONSTRAINT conta_pessoal_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id);
ALTER TABLE ONLY public.historico_transacao_empresarial
    ADD CONSTRAINT historico_transacao_empresarial_id_conta_empresarial_fkey FOREIGN KEY (id_conta_empresarial) REFERENCES public.conta_empresarial(id);
ALTER TABLE ONLY public.historico_transacao_empresarial
    ADD CONSTRAINT historico_transacao_empresarial_id_transacao_fkey FOREIGN KEY (id_transacao) REFERENCES public.transacao(id);
ALTER TABLE ONLY public.historico_transacao_pessoal
    ADD CONSTRAINT historico_transacao_pessoal_id_conta_pessoal_fkey FOREIGN KEY (id_conta_pessoal) REFERENCES public.conta_pessoal(id);
ALTER TABLE ONLY public.historico_transacao_pessoal
    ADD CONSTRAINT historico_transacao_pessoal_id_transacao_fkey FOREIGN KEY (id_transacao) REFERENCES public.transacao(id);

INSERT INTO public.transacao
    (tipo)
    VALUES('Deposito');
INSERT INTO public.transacao
    (tipo)
    VALUES('Transferencia');
INSERT INTO public.transacao
    (tipo)
    VALUES('Recarga de celular');
INSERT INTO public.transacao
    (tipo)
    VALUES('Compra');
INSERT INTO public.transacao
    (tipo)
    VALUES('Pagamento de conta');