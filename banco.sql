--
-- PostgreSQL database dump
--

\restrict rhVTkbnurspHARjCKJcG20xAIXzADVGIV6aUXomgkaeZBs9YiqSq17bornUDJ5Q

-- Dumped from database version 18.1
-- Dumped by pg_dump version 18.1

-- Started on 2026-07-13 10:23:41

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 222 (class 1259 OID 16764)
-- Name: solicitacoes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.solicitacoes (
    id integer NOT NULL,
    usuario_id integer NOT NULL,
    titulo character varying(200) NOT NULL,
    descricao text NOT NULL,
    status character varying(20) DEFAULT 'Pendente'::character varying,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.solicitacoes OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16763)
-- Name: solicitacoes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.solicitacoes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.solicitacoes_id_seq OWNER TO postgres;

--
-- TOC entry 5029 (class 0 OID 0)
-- Dependencies: 221
-- Name: solicitacoes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.solicitacoes_id_seq OWNED BY public.solicitacoes.id;


--
-- TOC entry 220 (class 1259 OID 16747)
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nome character varying(150) NOT NULL,
    cep character varying(9) NOT NULL,
    login character varying(80) NOT NULL,
    senha text NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16746)
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_seq OWNER TO postgres;

--
-- TOC entry 5030 (class 0 OID 0)
-- Dependencies: 219
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- TOC entry 4863 (class 2604 OID 16767)
-- Name: solicitacoes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitacoes ALTER COLUMN id SET DEFAULT nextval('public.solicitacoes_id_seq'::regclass);


--
-- TOC entry 4861 (class 2604 OID 16750)
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- TOC entry 5023 (class 0 OID 16764)
-- Dependencies: 222
-- Data for Name: solicitacoes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.solicitacoes (id, usuario_id, titulo, descricao, status, created_at) FROM stdin;
4	2	Trocar Cartucho de impressora	Trocar Cartucho	Pendente	2026-07-13 08:43:50.590374
5	2	Trocar Cartucho	Trocar Cartucho da Impressora	Pendente	2026-07-13 08:48:14.686877
6	2	Nova Solicitação	Nova Teste	Concluido	2026-07-13 08:50:20.036562
7	2	Trocar Cartucho	Trocar Cartucho com Urgência	Pendente	2026-07-13 10:17:02.820146
\.


--
-- TOC entry 5021 (class 0 OID 16747)
-- Dependencies: 220
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id, nome, cep, login, senha, created_at) FROM stdin;
1	Caio Dultra	86870000	caio	$2y$10$imZckul.ltYSzYA8fM0zq.brPNqqiQCry/JhorafauQfb3VRiUQl2	2026-07-11 12:56:33.761693
2	Lucas Eduardo	86870000	lucaseduardo15	$2y$10$.8JuExwWLf0wGNroQcQcWeD1s/9mxuMWC5aux73rWhzv/vtrBUP9q	2026-07-12 17:11:07.429825
3	Matheus Dias	86870000	matheusdias123	$2y$10$YAOTiaqkZVxURb9qAlMCOeoqEb58YBlkSBNF4OgVzgVjB5L9RB9M6	2026-07-12 20:12:24.087477
\.


--
-- TOC entry 5031 (class 0 OID 0)
-- Dependencies: 221
-- Name: solicitacoes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.solicitacoes_id_seq', 7, true);


--
-- TOC entry 5032 (class 0 OID 0)
-- Dependencies: 219
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 3, true);


--
-- TOC entry 4871 (class 2606 OID 16777)
-- Name: solicitacoes solicitacoes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitacoes
    ADD CONSTRAINT solicitacoes_pkey PRIMARY KEY (id);


--
-- TOC entry 4867 (class 2606 OID 16762)
-- Name: usuarios usuarios_login_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_login_key UNIQUE (login);


--
-- TOC entry 4869 (class 2606 OID 16760)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- TOC entry 4872 (class 2606 OID 16778)
-- Name: solicitacoes fk_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitacoes
    ADD CONSTRAINT fk_usuario FOREIGN KEY (usuario_id) REFERENCES public.usuarios(id) ON DELETE CASCADE;


-- Completed on 2026-07-13 10:23:41

--
-- PostgreSQL database dump complete
--

\unrestrict rhVTkbnurspHARjCKJcG20xAIXzADVGIV6aUXomgkaeZBs9YiqSq17bornUDJ5Q

