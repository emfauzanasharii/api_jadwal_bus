PGDMP     0    :            	    x            trayek    12.4    12.4                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16419    trayek    DATABASE     �   CREATE DATABASE trayek WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Indonesian_Indonesia.1252' LC_CTYPE = 'Indonesian_Indonesia.1252';
    DROP DATABASE trayek;
                postgres    false            �            1259    16420    tbl_bus    TABLE     �   CREATE TABLE public.tbl_bus (
    bus_id character(11) NOT NULL,
    bus_nama character varying(50),
    bus_foto character varying(100)
);
    DROP TABLE public.tbl_bus;
       public         heap    postgres    false            �            1259    16430    tbl_hari    TABLE     j   CREATE TABLE public.tbl_hari (
    hari_id character(11) NOT NULL,
    hari_nama character varying(50)
);
    DROP TABLE public.tbl_hari;
       public         heap    postgres    false            �            1259    16435 
   tbl_jadwal    TABLE     :  CREATE TABLE public.tbl_jadwal (
    jadwal_id character(11) NOT NULL,
    jadwal_bus_id character(11),
    jadwal_terminal_awal character(11),
    jadwal_terminal_tujuan character(11),
    jadwal_hari character(11),
    jadwal_jam_berangkat time without time zone,
    jadwal_jam_sampai time without time zone
);
    DROP TABLE public.tbl_jadwal;
       public         heap    postgres    false            �            1259    16425    tbl_terminal    TABLE     v   CREATE TABLE public.tbl_terminal (
    terminal_id character(11) NOT NULL,
    terminal_nama character varying(50)
);
     DROP TABLE public.tbl_terminal;
       public         heap    postgres    false                      0    16420    tbl_bus 
   TABLE DATA           =   COPY public.tbl_bus (bus_id, bus_nama, bus_foto) FROM stdin;
    public          postgres    false    202                    0    16430    tbl_hari 
   TABLE DATA           6   COPY public.tbl_hari (hari_id, hari_nama) FROM stdin;
    public          postgres    false    204   X                 0    16435 
   tbl_jadwal 
   TABLE DATA           �   COPY public.tbl_jadwal (jadwal_id, jadwal_bus_id, jadwal_terminal_awal, jadwal_terminal_tujuan, jadwal_hari, jadwal_jam_berangkat, jadwal_jam_sampai) FROM stdin;
    public          postgres    false    205   �                 0    16425    tbl_terminal 
   TABLE DATA           B   COPY public.tbl_terminal (terminal_id, terminal_nama) FROM stdin;
    public          postgres    false    203   {       �
           2606    16424    tbl_bus tbl_bus_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.tbl_bus
    ADD CONSTRAINT tbl_bus_pkey PRIMARY KEY (bus_id);
 >   ALTER TABLE ONLY public.tbl_bus DROP CONSTRAINT tbl_bus_pkey;
       public            postgres    false    202            �
           2606    16434    tbl_hari tbl_hari_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.tbl_hari
    ADD CONSTRAINT tbl_hari_pkey PRIMARY KEY (hari_id);
 @   ALTER TABLE ONLY public.tbl_hari DROP CONSTRAINT tbl_hari_pkey;
       public            postgres    false    204            �
           2606    16439    tbl_jadwal tbl_jadwal_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.tbl_jadwal
    ADD CONSTRAINT tbl_jadwal_pkey PRIMARY KEY (jadwal_id);
 D   ALTER TABLE ONLY public.tbl_jadwal DROP CONSTRAINT tbl_jadwal_pkey;
       public            postgres    false    205            �
           2606    16429    tbl_terminal tbl_terminal_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.tbl_terminal
    ADD CONSTRAINT tbl_terminal_pkey PRIMARY KEY (terminal_id);
 H   ALTER TABLE ONLY public.tbl_terminal DROP CONSTRAINT tbl_terminal_pkey;
       public            postgres    false    203               7   x�3R�N��bg鬗U��e�&�"��R&hR. �,e�&�"�R1z\\\ U��         K   x�3T���Լ�<.#����D.c$��ĤR.$�����b.S$�����.3ds�JJ�̑Dr3���K�b���� �v         �   x�����0��������,��F2���'�Y������o1Rr��[���z!+���!���2�*{E��JX7B�#&��;3�b�-�vm�i[��z�߶�twڞ�����E�A4��c	�Hș�!_/�iq�r%h�)m�i��t~����O�ټ��<mOO��	C��<������/Պ��         ,   x�3T�ΐԢ�̼�G.#l�N\�؄��L�	�p��qqq ��9     