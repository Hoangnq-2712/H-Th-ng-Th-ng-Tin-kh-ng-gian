PGDMP     4    "            	    y            coffee    13.4    13.4     5           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            6           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            7           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            8           1262    24576    coffee    DATABASE     j   CREATE DATABASE coffee WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.1252';
    DROP DATABASE coffee;
                postgres    false            9           0    0    coffee    DATABASE PROPERTIES     H   ALTER DATABASE coffee SET search_path TO '$user', 'public', 'topology';
                     postgres    false            $           1259    27155    caphe    TABLE     ?  CREATE TABLE public.caphe (
    id_0 integer NOT NULL,
    geom public.geometry(Point,4326),
    "store-name" character(100),
    address character(200),
    email character(100),
    phone character(11),
    "store-image" character(100),
    "store-desc" character(100),
    "store-fb" character(100),
    store_ins character(100),
    store_twitter character(100),
    "store-id" character(100)
);
    DROP TABLE public.caphe;
       public         heap    postgres    false            %           1259    27161    caphe_id_0_seq    SEQUENCE     ?   CREATE SEQUENCE public.caphe_id_0_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.caphe_id_0_seq;
       public          postgres    false    292            :           0    0    caphe_id_0_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.caphe_id_0_seq OWNED BY public.caphe.id_0;
          public          postgres    false    293            ?           2604    27221 
   caphe id_0    DEFAULT     h   ALTER TABLE ONLY public.caphe ALTER COLUMN id_0 SET DEFAULT nextval('public.caphe_id_0_seq'::regclass);
 9   ALTER TABLE public.caphe ALTER COLUMN id_0 DROP DEFAULT;
       public          postgres    false    293    292            1          0    27155    caphe 
   TABLE DATA           ?   COPY public.caphe (id_0, geom, "store-name", address, email, phone, "store-image", "store-desc", "store-fb", store_ins, store_twitter, "store-id") FROM stdin;
    public          postgres    false    292   r       ;           0    0    caphe_id_0_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.caphe_id_0_seq', 21, true);
          public          postgres    false    293            ?           2606    27260    caphe caphe_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.caphe
    ADD CONSTRAINT caphe_pkey PRIMARY KEY (id_0);
 :   ALTER TABLE ONLY public.caphe DROP CONSTRAINT caphe_pkey;
       public            postgres    false    292            ?           1259    27283    sidx_caphe_geom    INDEX     @   CREATE INDEX sidx_caphe_geom ON public.caphe USING gist (geom);
 #   DROP INDEX public.sidx_caphe_geom;
       public            postgres    false    292            1   y  x????o?D???_1??Ό??'?k)?T??@???.?E?%???B*$*???TU?J??*?????'??w'???ډ+xY)?;?y???????
&?Fq??7????|C0?3?10?61????nX	?>??|??x??V???B?^2?~>FM?b2?ܰof?{)Z{?(?A?_?&??t!????d6y:?????????i?7͙2????}???[;?(?????ױncn+?[J??Q<?~??Û?/???l?0j???k?????F[h???zî?=???ms'?, ?2??^??9n9_M?B?????B?p$y?=z???)?	??_??~????+tx=E?H????<z!??(?=??d??Sҷ???%??&Wi?QA?08,?pnH?Mõ,?X??????d?6?;?is}S?i/?Ր?볟??E^5tYF?ڊšiS??h???s׮][=???\C9?p?+efW?????z}???????{??Ͻ??????^?>?M??4???l??c????l?]Rt???????jV???<?1?8v??E`????P?}? ?????Dn>o][x??l??|m6yj??1?əM???z'Q????1???T?Ko??C???}?????e??f??TV???Ϸt??@???黦??^??:c?;?Я(???A?Z	??r??^Iz&|?j?c???R7? ??sR?-??Ra??0?'??&?/?n???"?r?-?-????Sv????gO??;? Q???????????e??W???ʒ?V??57?SyվN?3m?T??????uTo????{=??-F??뵹V??Mk??q{?a??H??P}??????;2*?v????y:?
??N??S8!N^ڋͼ??-1ժ?Y? =??v?Bv0?S"?l??\????a7???9???h:??)??????mg)?v&$????r~G?z??(?(?)~?搏s9q??R>:?*])?l53?%???Ԇ?\??C?gn?Y?0h)8???h?g?%)?)???7D,%????rq???????D????? M??T?h???	'y?ö`g{ ^m?I???p??d?? ?Pp???kh3J?(??q??%ǫ?<4????%??fF??T?+?????d.?? ??Z/:.?y_f&d??4?4(?-???Cڙ???f?k?J?$@??????"/,,6??U?|???vc?a?Ǳ?'????1?w??<??Ihu?֗c??
?<ϣX???p??p?íKi??-O??6Yt@ʜ?px???!?]G;?Gm?'i???㰅??G?5گ״.??zQV%?EY??S?o???h???f?ZX?&???S?E?3_?Lk??(G????Y???Z/????D?
?v?R^??2D????C+󧼓???Qz]?a2?R?J??c?Ħ???w??.??z?R%U?J?5|?0 ?`?? ph????^qh`??¡J?
?ĵ	???-X?ض??u?ly?\?z?!???????U?ʡ?tLOn????K??G??Z?ܩ??rg?6s(e?(?{?????r@gUK?v?ҥ??~Ek2?#c???7{????F?r?N>!??NZ?j??????????8?yEX?%????qj\-?c??h|?P?Aɠ???dt????f??h=??????Z/d??*??R?
???3???4u??{?T???Sdfa?X?|#???Ӥ?c^h?x!`?!?z^???<?U?C̏lJ?Ύ?.??z?]????@P?-?:??A????????`??
?Ͽ? b????/??iN??W? ???W?Rg?Yn????v???wǦB7-?̿T??FL?wMf???????G?̥BL[?l.?n??8??^ ?Y?j????????Ʌ0.     