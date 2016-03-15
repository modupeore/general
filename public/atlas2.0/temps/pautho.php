<?php
   // $connection = mysqli_connect("localhost","frnakenstein", "maryshelley","transcriptatlas") or die("Error " . mysqli_error($connection));
  
    //fetch department names from the department table
 //   $sql = 'select distinct a.gene_short_name as species from genes_fpkm a join bird_libraries b on a.library_id = b.library_id where b.species = "gallus"';
   // $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
    $dname_list = array("-","17.5","A1CF","A2LD1","A2LD1,TMTC4","A2M","A2ML1","A2ML1,RIMKLB","A2ML2","A2ML3","A2ML4,PSMC5","A4GNT","AAAS","AACS","AACS,LOC101747874","AACS,LOC101747874,TMEM132B","AADACL2","AADACL2,MIR1754,SUCN","AADACL2,MIR1754,SUCNR1","AADACL3","AADACL3,LOC768647","AADACL4","AADACL4,C21H1orf158","AADACL4,C21H1orf158,","AADACL4,LOC768489","AADACL4,LOC768489,LOC768580","AADACL4,LOC768580","AADAT","AADAT,PALLD","AAGAB","AAK1","AAK1,LOC101748094","AAK1,LOC101748094,NF","AAK1,LOC101748094,NFU1","AAK1,NFU1","AAMP","AAMP,CXCR2","AAMP,TMBIM1","AANAT","AARS","AARS,LOC427533","AARS2","AARS2,TCTE1","AARSD1","AASDH","AASDH,PPAT","AASDHPPT","AASS","AATF","AATK","AATK,LOC422075","ABAT","ABAT,METTL22","ABAT,METTL22,PMM2","ABAT,PMM2","ABCA1","ABCA12","ABCA13","ABCA2","ABCA2,LOC417293","ABCA2,LOC417293,TMEM141","ABCA2,TMEM141","ABCA3,LOC101749037","ABCA3,LOC101749037,L","ABCA3,LOC101749037,LOC770114","ABCA4","ABCA5","ABCA5,ABCA8","ABCA5,ABCA9","ABCA7","ABCA7,C19ORF6","ABCA7,CNN2","ABCA8","ABCA8,ABCA9","ABCA9","ABCB10","ABCB10,NUP133","ABCB10,TAF5L","ABCB11","ABCB11,SPC25","ABCB1LA","ABCB1LA,ABCB1LB","ABCB1LB","ABCB6","ABCB6,ATG9A","ABCB7","ABCB8","ABCB8,NOS3","ABCB9","ABCB9,LOC101749631","ABCC1","ABCC10","ABCC10,LOC101752145","ABCC13","ABCC13,RBM11","ABCC2","ABCC3","ABCC3,LUC7L3","ABCC4","ABCC5","ABCC5,RNPEPL1","ABCC6","ABCC8","ABCC8,KCNJ11","ABCC9","ABCD2","ABCD3","ABCD4","ABCE1","ABCF2","ABCF3","ABCF3,AP2M1","ABCF3,AP2M1,LOC101747338","ABCF3,LOC101747338","ABCF3,VWA5B2","ABCG1","ABCG2","ABCG2,BLOC1S2","ABCG2,PKD2L1","ABCG4","ABCG4,CBL,LOC419755,PDZD3","ABCG4,HINFP","ABCG4,LOC419755","ABCG4,LOC419755,PDZD3","ABCG5","ABCG8","ABHD10","ABHD10,TAGLN3","ABHD11","ABHD11,CLDN3","ABHD11,LOC100857937,MTMR4","ABHD12","ABHD12B","ABHD13","ABHD14A","ABHD14A,ACY1","ABHD14A,ACY1,SEMA3G","ABHD17B","ABHD17B,LOC101750866","ABHD17C","ABHD2","ABHD2,FANCI","ABHD3","ABHD5","ABHD6","ABHD6,FLNB","ABHD8","ABHD8,USHBP1","ABI1","ABI2","ABI2,CYP20A1","ABI3,IGF2BP1,LOC101750432","ABI3,LOC101750432","ABI3BP","ABL1","ABL1,EXOSC2","ABL2","ABLIM1","ABLIM1,AFAP1L2","ABLIM2","ABLIM3","ABLIM3,AFAP1L1","ABP1","ABRA","ABTB1","ABTB1,PODXL2","ABTB2","ACAA1","ACAA1,LOC420419","ACAA2","ACACA","ACACA,SYNRG","ACACB","ACACB,UNG","ACACB,USP30","ACAD10","ACAD10,ALDH2","ACAD11","ACAD11,NPHP3","ACAD8","ACAD8,GLB1L2","ACAD8,VPS26B","ACAD9","ACAD9,LOC415976","ACADL","ACADL,C7H2ORF67","ACADL,MYL1","ACADS","ACADS,MLEC","ACADS,MLEC,UNC119B","ACADS,UNC119B","ACADSB","ACAN","ACAP2","ACAP2,LOC101749717,XXYLT1","ACAP2,XXYLT1","ACAP3","ACAP3,LOC101750302","ACAT1","ACAT1,CUL5","ACAT2","ACAT2,MRPL18","ACBD3","ACBD5","ACBD5,YME1L1","ACBD6","ACBD7","ACBD7,NMT2","ACCN1","ACCN1,LOC101749945","ACCN2","ACCS","ACCS,EXT2","ACD","ACD,LOC101748539","ACE","ACE,KCNH6","ACE,TANC2","ACE2","ACER1","ACER2","ACER3","ACHE","ACLY","ACLY,DHX58,KAT2A,LOC772158","ACLY,DNAJC7","ACLY,DNAJC7,NT5C3L","ACLY,KLHL11","ACLY,NT5C3L","ACMSD","ACMSD,CCNT2","ACN9","ACO1","ACO2","ACOT11","ACOT12","ACOT4","ACOT4,C5H14ORF169","ACOT4,LOC423247,LOC771753","ACOT7","ACOT7,CHD5","ACOT7,ICMT","ACOT7,RPL22","ACOT7,TNFRSF25","ACOT8","ACOT8,LOC771994","ACOT8,TNNC2","ACOT9","ACOT9,APOO","ACOT9,LOC101750943","ACOX1","ACOX1,FBF1","ACOX1,FBF1,MRPL38","ACOX1,MRPL38","ACOX2","ACOX2,FAM107A","ACOX3","ACP1","ACP2","ACP6","ACPL2","ACPL2,LOC424816","ACPP","ACR","ACR,ARSA","ACR,LOC769176","ACRBP","ACRC","ACRC,MTCP1NB","ACRC,OGT","ACSBG1","ACSBG1,WDR61","ACSBG2","ACSF2","ACSF2,EME1","ACSF2,EME1,LOC422106","ACSF2,EME1,MYCBPAP","ACSF2,EPN3","ACSF2,MYCBPAP","ACSF3","ACSL1","ACSL1,MLF1IP","ACSL3","ACSL4","ACSL4,LOC100858624","ACSL5","ACSL5,VTI1A","ACSL6","ACSL6,LOC771537","ACSM3","ACSM4","ACSM4,ACSM5","ACSM5","ACSS1","ACSS1,C3H20ORF3","ACSS1,C3H20ORF3,DSTN","ACSS2","ACSS3","ACTA1","ACTA2","ACTB,FBXL18,MIR3533","ACTB,MIR3533","ACTBL2","ACTBL2,FBXO3,LOC415641","ACTBL2,LOC101750458,LOC415641","ACTBL2,LOC415641","ACTBL2,SHANK2","ACTC1","ACTG1","ACTG1,UBL7","ACTG2","ACTG2,LOC419511,LOC771090","ACTG2,LOC771090","ACTL6A","ACTL9","ACTN1","ACTN1,SRSF5A","ACTN2","ACTN4","ACTN4,SAMD14","ACTR10","ACTR10,LOC100859826","ACTR10,LOC100859826,PSMA3","ACTR1A","ACTR2","ACTR3","ACTR3B","ACTR5","ACTR6","ACTR6,SCYL2","ACTR8","ACTR8,CHDH","ACTR8,SELK","ACTRT2","ACVR1","ACVR1,ACVR1C","ACVR1B","ACVR1C","ACVR1C,CYTIP","ACVR2A","ACVR2A,EPC2","ACVR2B","ACVRL1","ACVRL1,ANKRD33","ACY1","ACY1,BAP1","ACY1,BAP1,LOC100859224,PARP3,SEMA3G","ACY1,BAP1,SEMA3G","ACY1,LOC100859224,PARP3","ACY1,SEMA3G","ACYP1","ACYP1,MLH3","ACYP1,NEK9","ACYP2","ADA","ADA,LOC101747703","ADA,LOC101747703,SERINC3","ADAD1","ADAL","ADAL,LRRC49","ADAL,LRRC49,TARSL2,TM2D3","ADAL,TARSL2,TM2D3","ADAL,TM2D3","ADAM10","ADAM11","ADAM11,DBF4B","ADAM12","ADAM12,C6H10ORF90","ADAM15","ADAM17","ADAM17,YWHAQ","ADAM19","ADAM20","ADAM22","ADAM23","ADAM23,LOC424098","ADAM23,ZDBF2","ADAM28","ADAM32,ADAM9,LOC100857794,LOC100859804,LOC101752185","ADAM32,ADAM9,LOC100859804,LOC101752185","ADAM32,LOC100857794,LOC100859804,LOC101752185","ADAM32,LOC100859804,","ADAM32,LOC100859804,LOC101752185","ADAM33","ADAM33,ALMS1","ADAM5P","ADAM5P,PSTK","ADAM8","ADAM9","ADAM9,LOC100857794","ADAMTS1","ADAMTS10","ADAMTS10,MYO1F","ADAMTS10,MYO1F,ZNF414","ADAMTS12","ADAMTS13,C17H9ORF7,LOC101748979","ADAMTS13,LOC10174897","ADAMTS13,LOC101748979","ADAMTS14","ADAMTS15","ADAMTS17,LYSMD4","ADAMTS18","ADAMTS19","ADAMTS2","ADAMTS20","ADAMTS3","ADAMTS5","ADAMTS6","ADAMTS7","ADAMTS7,SPG11","ADAMTS8","ADAMTS9","ADAMTSL1","ADAMTSL2","ADAMTSL3","ADAMTSL5","ADAMTSL5,GZMM,LOC100858862","ADAMTSL5,LOC426398","ADAP1","ADAP1,COX19","ADAP2","ADAP2,ATAD5","ADAP2,RHOT1","ADAR","ADAR,LOC100857714","ADAR,LOC100857714,LOC426902","ADAR,LOC100857714,SLAMF1","ADAR,LOC100857999,PBXIP1","ADAR,LOC777372","ADARB1","ADARB1,FAM207A","ADARB2","ADAT1","ADAT1,CHST4,KARS","ADAT1,CHST4,KARS,TAT","ADAT1,CHST6,KARS,TMEM231","ADAT1,CHST6,TMEM231","ADAT1,KARS","ADAT2","ADC","ADC,NDUFS5","ADCK1","ADCK1,LOC101747694","ADCK2","ADCK3","ADCK3,PSEN2","ADCY1","ADCY1,LOC420789","ADCY10","ADCY10,LOC100858603,LOC101747355,LOC101747756,LOC101747990,LOC101751964","ADCY10,LOC100858603,LOC101747355,LOC101747756,LOC101751964","ADCY10,LOC101747355,","ADCY10,LOC101747355,LOC101747756,LOC101751964","ADCY2","ADCY3","ADCY3,DNAJC27","ADCY5","ADCY7","ADCY7,PAPD5","ADCY8","ADCY8,LOC101749402","ADCY9","ADCY9,SRL","ADCYAP1","ADCYAP1R1","ADD1","ADD3","ADD3,LOC101749148","ADD3,MXI1","ADH1C","ADH1C,ADH5","ADH1C,ADH5,ADH6,LOC100857280","ADH1C,ADH6,LOC100857","ADH1C,ADH6,LOC100857280","ADH1C,ADH6,LOC100857280,TRMT10A","ADH1C,LOC100857280","ADH5","ADH5,ADH6,LOC100857280","ADH6","ADH6,LOC100857280","ADHFE1","ADI1","ADIPOQ","ADIPOR1","ADIPOR1,LMOD1","ADIPOR2","ADIRF","ADIRF,SNCG","ADK","ADM","ADM2","ADMP","ADNP","ADNP,DPM1","ADNP2","ADORA1","ADORA2A","ADORA2A,SPECC1L","ADORA2B","ADORA2B,SPECC1","ADORA2B,TTC19","ADORA3","ADPGK","ADPRH","ADPRHL1","ADPRHL1,DCUN1D2","ADPRHL2","ADPRHL2,EIF2C3","ADPRHL2,TEKT2","ADRA1A","ADRA1B","ADRA1B,TTC1","ADRA1D","ADRA2A","ADRA2B","ADRA2B,GRK6,SLC34A1","ADRA2B,RGS14","ADRA2B,SLC34A1","ADRA2C","ADRB1","ADRB2","ADRBK1","ADRBK1,KDM2A","ADRBK1,SSH3","ADRBK2","ADRBK2,LOC101748641","ADRBK2,LOC101748641,MYO18B","ADRBK2,MYO18B","ADRM1","ADRM1,OSBPL2","ADSL","ADSL,LOC101749840,TN","ADSL,LOC101749840,TNRC6B","ADSL,SGSM3","ADSS","ADSSL1","AEBP2","AEBP2,PLEKHA5","AEN","AEN,MIR1720","AEN,MIR1720,MIR7-2","AES","AES,LOC100858505","AES,LOC100858505,LOC101750616","AES,LOC101750616","AFAP1","AFAP1L1","AFAP1L1,GRPEL2","AFAP1L1,PCYOX1L","AFAP1L2","AFF1","AFF2","AFF3","AFF4","AFF4,LOC100858054,LOC100858325","AFG3L2","AFMID","AFMID,ARL16","AFMID,SYNGR2","AFP","AFTPH","AGA","AGAP1","AGAP3","AGBL1","AGBL2","AGBL2,CABP2","AGBL2,CABP2,FNBP4","AGBL2,CABP2,FNBP4,NUP160","AGBL2,FNBP4","AGBL2,FNBP4,MTCH2,NUDT8,NUP160","AGBL2,FNBP4,NUP160","AGBL2,MTCH2,NUDT8","AGBL2,NUP160","AGBL3","AGBL4","AGBL4,BEND5","AGBL5","AGBL5,EIF2B4","AGFG1","AGFG1,LOC101747462","AGGF1","AGK","AGK,LOC101749817","AGK,SSBP1,WEE2","AGK,WEE2","AGMAT","AGMAT,CASP9","AGMAT,CDA","AGMAT,PINK1","AGMO","AGPAT1","AGPAT2","AGPAT2,LOC100858649","AGPAT3","AGPAT3,TRAPPC10","AGPAT4","AGPAT5","AGPAT5,TMEM14A","AGPAT6","AGPAT6,GOLGA7","AGPAT6,LOC395787","AGPAT9","AGPAT9,LOC422609","AGPHD1","AGPHD1,CHRNA5,PSMA4","AGPHD1,IREB2","AGPHD1,IREB2,PSMA4","AGPHD1,PSMA4","AGPS","AGPS,LOC101749496","AGR2","AGR3","AGR3,LOC101749210","AGRN","AGRP","AGT","AGTPBP1","AGTR1","AGTR2","AGTRAP","AGTRAP,CLCN6,LOC100859440","AGTRAP,LOC100859440","AGXT","AGXT2","AGXT2L1","AGXT2L1,COL25A1","AGXT2L2","AGXT2L2,COL23A1","AHCTF1,LOC101748750","AHCTF1,LOC101748750,","AHCTF1,LOC101748750,MIR1717","AHCY","AHCYL1","AHCYL2","AHI1","AHR","AHR,LOC101749298","AHRR","AHRR,LOC101748694","AHSA1","AHSA2","AHSA2,LOC421195","AHSG","AHSG,EIF4G1","AHSG,FETUB","AHSG,HRG","AICDA","AICDA,MFAP5","AIDA","AIFM1","AIFM2","AIFM3","AIFM3,LOC100858995","AIG1","AIM1","AIM1,LOC101750653","AIM1L","AIMP1","AIMP1,LOC101750941","AIMP2","AIP","AIP,NLRP3","AIPL1","AIPL1,BTK,TAF7","AIPL1,BTK,TAF7,TIMM8A","AIPL1,GLA,TAF7,TIMM8A","AIPL1,TAF7","AIPL1,TAF7,TIMM8A","AIRE","AIRE,LOC424740","AIRE,LOC424740,MIR16","AIRE,LOC424740,MIR1630","AIRE,LOC424740,MIR1630,RN5S","AIRE,LOC424740,MIR1630,SLC35G2","AIRE,LOC424740,SLC35G2","AIRE,MIR1630","AJAP1","AK1","AK1,DPM2","AK1,DPM2,ENG,FAM102A","AK1,ENG","AK1,ST6GALNAC4","AK1,ST6GALNAC6","AK2","AK2,RNF19B","AK3","AK4","AK5","AK7","AK7,C5H14ORF129","AK7,PAPOLA","AK8","AK8,DDX31","AKAP1","AKAP1,NF1","AKAP10","AKAP10,NLE1","AKAP11","AKAP12","AKAP13","AKAP13,LOC101752214","AKAP14","AKAP17A","AKAP17A,ASMT","AKAP2","AKAP2,SLC46A2","AKAP5","AKAP5,MTHFD1","AKAP6","AKAP7","AKAP8","AKAP8,AKAP8L","AKAP8,RASAL3","AKAP8L","AKAP8L,WIZ","AKAP9","AKD1","AKIP1","AKIRIN2","AKNAD1","AKR1A1","AKR1A1,NASP","AKR1B1,AKR1B10","AKR1B1,AKR1B10,ENSGALG00000019284","AKR1B10","AKR1B1L","AKR1B1L,LOC418169","AKR1B1L,LOC418169,LOC418170","AKR1B1L,LOC418169,LOC418170,LOC425137","AKR1B1L,LOC418169,LOC425137","AKR1B1L,LOC418170","AKR1B1L,LOC418170,LOC425137","AKR1B1L,LOC425137","AKR1D1","AKR7A2","AKR7A2,CAPZB","AKR7A2,EMC1","AKT1","AKT1,LOC101750390","AKT3","AKTIP","ALAS1","ALB","ALC","ALCAM","ALDH18A1","ALDH18A1,LOC100857412","ALDH18A1,LOC100857412,TCTN3","ALDH1A1","ALDH1A2","ALDH1A3","ALDH1A3,LOC101750259,LRRK1","ALDH1L2","ALDH1L2,LOC100857360","ALDH2","ALDH2,MAPKAPK5","ALDH3A2","ALDH3A2,ULK2","ALDH3B1","ALDH3B1,LOC428812","ALDH3B1,LOC428812,LOC769478","ALDH3B1,LOC428812,LOC769478,NDUFS8","ALDH3B1,LOC428812,LOC769478,TCIRG1","ALDH3B1,LOC769478","ALDH3B1,LOC769478,NDUFS8","ALDH4A1","ALDH4A1,IFFO2","ALDH5A1","ALDH6A1","ALDH6A1,ENTPD5","ALDH7A1","ALDH8A1","ALDH8A1,HBS1L","ALDH9A1","ALDH9A1,NUF2","ALDH9A1,TMCO1","ALDOB","ALDOB,C9ORF125","ALDOB,MRPL50","ALDOC","ALDOC,KIAA0100","ALDOC,KIAA0100,PIGS","ALDOC,KIAA0100,PIGS,SPAG5","ALDOC,PIGS","ALDOC,PIGS,SPAG5","ALDOC,PIGS,UNC119","ALG1","ALG1,NDUFB6","ALG10","ALG11","ALG12","ALG13","ALG14","ALG14,CNN3","ALG2","ALG3","ALG3,ECE2","ALG3,LOC770265","ALG5","ALG5,FAM48A","ALG6","ALG8","ALG8,KCTD21","ALG8,LOC101748650,THRSP","ALG9","ALG9,CRYAB","ALG9,FDXACB1","ALG9,VWA5A","ALK","ALKBH1","ALKBH1,SNW1","ALKBH2","ALKBH2,SVOP","ALKBH3","ALKBH3,HSD17B12","ALKBH4","ALKBH4,RASA4","ALKBH5","ALKBH5,LLGL1","ALKBH5,MYO15A","ALKBH8","ALKBH8,CWF19L2","ALMS1","ALOX5","ALOX5,MARCH8","ALOX5AP","ALOX5AP,USPL1","ALOXE3","ALPI","ALPI,ALPP","ALPI,ALPP,DIS3L2","ALPI,DIS3L2","ALPK1","ALPK2","ALPK3","ALPL","ALPP","ALPP,DIS3L2","ALS2","ALS2,MPP4","ALS2CL,MIR1639","ALS2CL,MIR1639,SNAP47","ALS2CR8","ALX1","ALX3","ALX4","ALYREF","ALYREF,ARHGDIA","ALYREF,MAFG,PCYT2","ALYREF,PCYT2","AMACR","AMBP","AMBP,RABL6","AMBRA1","AMBRA1,CHRM4","AMBRA1,HARBI1","AMD1","AMD1,GTF3C6","AMDHD1","AMDHD1,SNRPF","AMDHD2","AMDHD2,ATP6V0C","AMDHD2,C14H8ORF33","AMDHD2,C14H8ORF33,LOC770260","AMER3","AMFR","AMFR,NUDT21","AMH","AMH,SF3A2","AMICA1","AMICA1,MPZL2","AMICA1,SCN2B","AMICA1,SCN4B","AMIGO2","AMIGO3","AMIGO3,GMPPB","AMMECR1","AMMECR1L","AMMECR1L,POLR2D","AMMECR1L,SAP130","AMN","AMN1","AMOT","AMOTL1","AMOTL2","AMPD1","AMPD1,BCAS2,DENND2C","AMPD1,BCAS2,DENND2C,NRAS","AMPD1,BCAS2,DENND2C,TRIM33","AMPD1,CSDE1","AMPD1,DENND2C","AMPD1,NRAS","AMPD2","AMPD3","AMPH","AMPH,LOC101751400,LOC101751457,LOC776580","AMPH,LOC776580","AMPH,LOC776593","AMT","AMT,DAG1","AMT,DAG1,UBA7","AMT,IP6K1","AMT,IP6K1,UBA7","AMT,LOC101751202","AMT,LOC101751202,UBA7","AMT,UBA7","AMY1A","AMY1A,LOC768251","AMY1A,LOC768251,RNPC","AMY1A,LOC768251,RNPC3","AMY1A,RNPC3","AMY2A","AMY2A,LOC101751584","AMYP","AMZ1","ANAPC1","ANAPC10","ANAPC10,OTUD4","ANAPC13","ANAPC13,TMEM41A","ANAPC15","ANAPC16","ANAPC2","ANAPC2,C9ORF167","ANAPC2,C9ORF167,TPRN","ANAPC2,TPRN","ANAPC4","ANAPC4,PI4K2B","ANAPC4,ZCCHC4","ANAPC5","ANAPC5,CAMKK2","ANAPC5,KDM2B","ANAPC7","ANAPC7,ARPC3","ANAPC7,ARPC3,GPN3","ANG","ANG,RSFR","ANGEL1","ANGEL2","ANGPT1","ANGPT2","ANGPT4","ANGPT4,C20H20ORF54","ANGPTL1","ANGPTL2","ANGPTL3","ANGPTL4","ANGPTL4,RAB11B","ANGPTL5","ANGPTL6","ANGPTL6,LOC100857922","ANGPTL6,LOC100857922,LOC426257","ANGPTL6,LOC100857922,LOC426257,TBL2","ANGPTL6,LOC426257","ANGPTL7","ANK1","ANK2","ANK3","ANKDD1A","ANKDD1B","ANKFN1","ANKFY1","ANKFY1,UBE2G1","ANKFY1,ZZEF1","ANKH","ANKH,LOC101750709","ANKHD1","ANKHD1,LOC100858407","ANKIB1","ANKK1","ANKLE1","ANKLE1,BABAM1","ANKLE1,DDA1","ANKLE1,MRPL34","ANKLE2","ANKLE2,GOLGA3","ANKMY1","ANKMY2","ANKRA2","ANKRD1","ANKRD10","ANKRD11","ANKRD12","ANKRD12,TWSG1","ANKRD13A","ANKRD13B","ANKRD13B,TAOK1","ANKRD13C","ANKRD16","ANKRD16,GDI2","ANKRD16,GDI2,SLC35B4","ANKRD17","ANKRD17,COX18","ANKRD2","ANKRD2,C10ORF65","ANKRD2,C10ORF65,UBTD1","ANKRD2,UBTD1","ANKRD22","ANKRD24","ANKRD24,CREB3L3","ANKRD26","ANKRD26,CTTNBP2","ANKRD27","ANKRD28","ANKRD29","ANKRD29,NPC1","ANKRD31","ANKRD32","ANKRD33","ANKRD33B","ANKRD34B","ANKRD34B,LOC100859442","ANKRD34B,LOC100859442,LOC768418","ANKRD34C","ANKRD34C,TMED3","ANKRD40","ANKRD42","ANKRD44","ANKRD44,C7H2ORF66,PGAP1","ANKRD44,PGAP1","ANKRD46","ANKRD46,LOC101748835","ANKRD47","ANKRD47,NDUFA7","ANKRD49","ANKRD49,LOC101751913","ANKRD50","ANKRD52","ANKRD52,CS","ANKRD52,RNF41","ANKRD54","ANKRD54,LOC100858286","ANKRD55","ANKRD6","ANKRD60","ANKRD60,PPP4R1L","ANKRD9","ANKS1A","ANKS1A,UHRF1BP1","ANKS1B","ANKS1B,LOC769249","ANKS3","ANKS4B","ANKS6","ANKZF1","ANKZF1,LOC100858626","ANKZF1,STK16","ANLN","ANO1","ANO1,FADD","ANO10","ANO2","ANO2,VWF","ANO3","ANO4","ANO5","ANO6","ANO8","ANO8,CILP2","ANO9","ANP32A","ANP32B","ANP32E","ANPEP","ANPEP,AP3S2","ANPEP,GNRHR","ANPEP,MESP2","ANTXR1","ANTXR2","ANTXRL","ANTXRL,ANXA8","ANXA1","ANXA10","ANXA11","ANXA13","ANXA13,KLHL38","ANXA2","ANXA2,NARG2","ANXA5","ANXA6","ANXA6,CCDC69","ANXA6,TNIP1","ANXA7","ANXA8","AOAH","AOC3","AOC3,CNTD1,LOC100857298,PSME3","AOC3,IFI35,LOC100857298","AOC3,LOC100857298","AOC3,LOC100857298,PSME3","AOC3,PSME3","AOC3,PSME3,RPL27","AOX1","AOX1,AOX2P","AOX1,AOX2P,BZW1","AOX1,AOX2P,BZW1,SGOL2","AOX1,SGOL2","AOX2P","AOX2P,BZW1","AP1AR","AP1B1","AP1G1","AP1G1,PHLPP2","AP1G1,PHLPP2,TAT","AP1M1","AP1M1,FAM32A","AP1M1,FAM32A,RAB8A","AP1M1,RAB8A","AP1S2","AP1S3","AP1S3,LOC101750767,SCG2","AP1S3,WDFY1","AP2A2","AP2B1","AP2B1,RASL10B","AP2M1","AP2M1,DVL3","AP2M1,LOC101747338","AP2M1,LOC101747338,LOC431092","AP2M1,VWA5B2","AP3B1","AP3B2","AP3B2,CPEB1","AP3B2,MIR1688","AP3D1","AP3D1,LOC100857182","AP3D1,LOC100857182,MKNK2","AP3D1,MKNK2","AP3M1","AP3M2,LOC101749237","AP3S1","AP3S1,LOC431649","AP3S2","AP3S2,IDH2","AP4B1","AP4B1,BCL2L15","AP4B1,PTPN22","AP4E1","AP4S1","AP5Z1","AP5Z1,FOXK1","AP5Z1,FOXK1,MIR2129","AP5Z1,MIR2129","APAF1","APBA1","APBA2","APBA2,MCEE","APBA3","APBA3,LOC769223,RAX2","APBB1","APBB1,FAM160A2","APBB1,HPX","APBB1,HPX,TRIM3","APBB1,TRIM3","APBB1IP","APBB2","APBB3","APC","APC,SRP19","APC2","APC2,DAZAP1","APC2,MIR1777","APC2,RPS15","APCDD1","APCDD1L","APEH","APEH,BSN,LOC770794","APEH,LOC770794","APEX1","APH1A","APH1A,TLN1,TPM2","APH1A,TPM2","API5","API5,TTC17","APIP","APIP,LOC101751216","APITD1","APITD1,KIF1B,PGD","APITD1,PGD","APLF","APLN","APLN,ZDHHC9","APLNR","APLP2","APOA1","APOA1,APOA4","APOA1,APOA4,APOA5,BUD13,LOC770165,ZNF259","APOA1,APOA4,APOA5,ZNF259","APOA1,APOA5,BUD13,LOC770165,ZNF259","APOA1,APOA5,ZNF259","APOA1,LOC777317","APOA1BP","APOA4","APOA4,APOA5,ZNF259","APOA4,BUD13,LOC770165","APOA4,LOC777317","APOA5,BUD13,LOC77016","APOA5,BUD13,LOC770165,ZNF259","APOA5,BUD13,ZNF259","APOA5,LOC777317,ZNF259","APOA5,ZNF259","APOB","APOBEC2","APOBEC2,NFYA","APOBEC2,TSPO2","APOBEC4","APOC3","APOD","APOD,LOC424892","APOD,PPP1R2","APOH","APOH,CEP112","APOLD1","APOLD1,DDX47","APOO","APOO,KLHL15","APOOL","APOOL,LOC101749695,L","APOOL,LOC101749695,LOC101749809,LOC422270,ZNF711","APOOL,LOC101749695,LOC422270,ZNF711","APOPT1","APOPT1,KLC1","APOV1","APP","APPBP2","APPL1","APPL2","APPL2,LOC100857286","APRT","APRT,GALNS","APTX","APTX,SMU1","AQP1","AQP10","AQP10,ATP8B2","AQP10,ATP8B2,UBAP2L","AQP10,UBAP2L","AQP11","AQP12","AQP12,PAK2","AQP2","AQP3","AQP4","AQP4,CHST9","AQP5","AQP7","AQP8","AQP9","AQR","AQR,ZNF770","AR","ARAP2","ARAP3","ARAP3,FCHSD1","ARAP3,STARD10","ARC","ARCN1","ARCN1,TMPRSS5","AREGB","ARF1","ARF4","ARF4,DNAH12","ARF6","ARFGAP1","ARFGAP2","ARFGAP2,PACSIN3","ARFGAP3","ARFGAP3,PACSIN2","ARFGEF1","ARFGEF2","ARFIP1","ARFIP2","ARFIP2,LOC419074","ARFIP2,LOC419074,TRIM3","ARFIP2,TRIM3","ARFRP1","ARG2","ARGLU1","ARHGAP1","ARHGAP1,CKAP5","ARHGAP10","ARHGAP11A","ARHGAP12","ARHGAP15","ARHGAP17","ARHGAP18","ARHGAP19","ARHGAP19,RRP12","ARHGAP19,SLIT1","ARHGAP20","ARHGAP21","ARHGAP21,PRTFDC1","ARHGAP22","ARHGAP24","ARHGAP25","ARHGAP25,CDS2","ARHGAP25,LOC101751070","ARHGAP26","ARHGAP27","ARHGAP27,PLEKHM1","ARHGAP28","ARHGAP29","ARHGAP31,MIR3539","ARHGAP32","ARHGAP35","ARHGAP39","ARHGAP39,PHF20","ARHGAP40","ARHGAP40,LOC101749666","ARHGAP42","ARHGAP44","ARHGAP5","ARHGAP6","ARHGAP8","ARHGDIA","ARHGDIA,FAM195B","ARHGDIA,P4HB","ARHGDIA,PCYT2","ARHGDIB","ARHGDIB,ERP27","ARHGDIG","ARHGDIG,ITFG3","ARHGDIG,ITFG3,LOC100857897","ARHGDIG,LOC100857897","ARHGEF10","ARHGEF10,CLN8","ARHGEF10,KBTBD11","ARHGEF10L","ARHGEF10L,IGSF21,KLHDC7A","ARHGEF10L,PADI1,PADI3","ARHGEF10L,PADI3","ARHGEF11","ARHGEF11,LOC10085919","ARHGEF11,LOC100859194","ARHGEF11,LOC100859194,NR1I3","ARHGEF11,NR1I3","ARHGEF12","ARHGEF16","ARHGEF16,PRDM16","ARHGEF17","ARHGEF18","ARHGEF19","ARHGEF19,LOC419032","ARHGEF26","ARHGEF26,LOC101748443","ARHGEF3","ARHGEF3,FAM208A","ARHGEF33","ARHGEF37","ARHGEF38","ARHGEF38,GSTCD","ARHGEF4","ARHGEF6","ARHGEF6,RBMX","ARHGEF7","ARHGEF9","ARID1A","ARID1A,LOC101748393,PIGV","ARID1A,PIGV","ARID1B","ARID2","ARID3A","ARID3A,CFD","ARID3A,GRIN3B","ARID3A,WDR18","ARID3B","ARID4A","ARID4A,KIAA0586,LOC101751092","ARID4A,LOC101751092","ARID4A,PSMA3","ARID4B","ARID4B,RBM34","ARID5A","ARID5B","ARIH1","ARIH1,BBS4","ARIH1,HNRPK","ARIH2","ARIH2,P4HTM","ARL1","ARL1,NUP205","ARL10","ARL11","ARL13A","ARL13A,ATP11C","ARL13A,CSTF2","ARL13B","ARL14EPL","ARL14EPL,COMMD10","ARL15","ARL16","ARL16,SYNGR2","ARL2,B4GALT7,LMAN2","ARL2,LMAN2","ARL2,LMAN2,N4BP3","ARL2BP","ARL2BP,CX3CL1","ARL2BP,RSPRY1","ARL3","ARL4A","ARL4A,SCIN","ARL4C","ARL5B","ARL6","ARL6,CRYBG3","ARL6IP1","ARL6IP1,RPS15A","ARL6IP1,SMG1","ARL6IP4","ARL6IP4,OGFOD2","ARL6IP5","ARL8A","ARL8A,LOC101748005","ARL8B","ARL8B,EDEM1","ARL9","ARL9,SRP72","ARMC1","ARMC10","ARMC2","ARMC3","ARMC4","ARMC6","ARMC6,SLC25A42","ARMC7","ARMC8","ARMC8,DBR1","ARMC9","ARMC9,B3GNT7","ARNT","ARNT,CTSK,CTSS","ARNT,CTSS","ARNT,LOC100857262,LOC100859441","ARNT2","ARNTL","ARNTL2","ARNTL2,STK38L","ARPC1A","ARPC1A,ARPC1B","ARPC1B","ARPC1B,BUD31","ARPC2","ARPC2,PNKD","ARPC2,PNKD,RUFY4","ARPC2,RUFY4","ARPC3","ARPC3,GPN3","ARPC4","ARPC4,BRPF1","ARPC4,BRPF1,TTLL3","ARPC4,LOC100858613","ARPC4,TTLL3","ARPC5","ARPC5,NCF2","ARPC5L","ARPC5L,PPP6C","ARPP19","ARPP19,FAM214A","ARPP19,MYO5A","ARPP21","ARR3","ARR3,LOC101751235,LOC422154","ARRDC1","ARRDC2","ARRDC2,C28H19orf45","ARRDC2,MAST3","ARRDC3","ARRDC4","ARRDC4,LOC101748819","ARSA","ARSA,NME6","ARSB","ARSB,DMGDH","ARSD","ARSD,ARSE","ARSD,ARSE,ARSH","ARSD,ARSH","ARSE","ARSE,ARSH","ARSG","ARSG,LOC771433","ARSH","ARSI","ARSJ","ARSJ,LOC101747253","ARSJ,LOC101751638","ARSK","ART1","ART1,ART7B","ART4,C1H12ORF69","ART4,C1H12ORF69,OC3","ART4,C1H12ORF69,OC3,WBP11","ART4,C1H12ORF69,WBP11","ART5","ART7B","ART7C","ART7C,LOC100857925","ART7C,MADPRT","ARTN","ARTN,IPO13","ARTN,IPO13,ST3GAL3","ARTN,ST3GAL3","ARV1","ARVCF","AS3MT","AS3MT,C6H10ORF32,CNNM2,LOC101752239","AS3MT,C6H10ORF32,LOC101752239","AS3MT,CNNM2","ASAH1","ASAH1,FRG1","ASAH2","ASAP1","ASAP2","ASAP2,CPSF3","ASB1","ASB10","ASB10,GBX1","ASB11","ASB12","ASB12,FAM123B","ASB12,MTMR8","ASB13","ASB13,LOC101748845","ASB14","ASB14,DNAH12","ASB15","ASB18","ASB18,GBX2","ASB2","ASB3","ASB4","ASB5","ASB6","ASB7","ASB7,LOC101750027","ASB7,LOC101750027,LOC101750074","ASB7,LOC101750074","ASB8","ASB8,ESPL1","ASB8,LOC100859376","ASB9","ASCC1","ASCC2","ASCC2,LOC101747790","ASCC2,ZMAT5","ASCC3","ASCL2","ASCL4","ASF1A","ASH1L","ASH2L","ASH2L,EIF4EBP1","ASIC4","ASIC4,LOC424199","ASIC4,TMEM198","ASIC5","ASIC5,CTSO","ASIP","ASL1","ASL1,ASL2","ASL1,ASL2,GUSB","ASL2","ASL2,GUSB","ASMT","ASMTL","ASMTL,P2RY8","ASMTL,SLC25A6","ASNS","ASNSD1","ASPA","ASPA,LOC101749175","ASPG","ASPG,TDRD9","ASPH","ASPH,LOC101750334","ASPHD2","ASPHD2,SEZ6L","ASPM","ASPM,F13B","ASPM,ZBTB41","ASPN","ASPSCR1","ASPSCR1,GPS1,LRRC45,RAC3","ASPSCR1,LRRC45","ASPSCR1,LRRC45,RAC3","ASRGL1","ASS1","ASTE1","ASTL","ASTL,LOC101747869,PRDM11","ASTN1","ASTN2","ASXL1","ASXL1,KIF3B","ASXL1,POFUT1","ASXL2","ASXL3","ASZ1","ASZ1,LOC101751592","ATAD1","ATAD2","ATAD2,C2H8ORF76,ZHX1","ATAD2,LOC101747445","ATAD2,ZHX1","ATAD2B","ATAD3A","ATAD3A,VWA1","ATAD5","ATCAY","ATCAY,LOC100858798","ATE1","ATE1,NSMCE4A","ATF1","ATF1,DIP2B","ATF2","ATF2,ATP5G3","ATF2,CHN1","ATF3","ATF4","ATF4,SMCR7L","ATF6","ATF6,SELP","ATF7","ATF7,LOC100858216","ATF7IP","ATG10","ATG10,ATP6AP1L","ATG12","ATG12,CDO1","ATG13","ATG14","ATG14,TBPL2","ATG16L1","ATG16L1,INPP5D","ATG2B","ATG3","ATG3,F5","ATG4A","ATG4B","ATG4B,ING5","ATG4C","ATG5","ATG7","ATG7,HRH1","ATG9A","ATG9A,GLB1L","ATHL1","ATHL1,B4GALNT4","ATHL1,PSMD13","ATIC","ATIC,LOC101748441,UBE2F","ATL1","ATL2","ATL2,LOC100859089","ATM","ATMIN","ATMIN,CENPN","ATN1","ATN1,C12ORF57","ATOH1","ATOH7","ATOH8","ATOX1","ATOX1,SPARC","ATP10A","ATP10B","ATP10B,LOC101751673","ATP10D","ATP11A","ATP11A,MCF2L","ATP11B","ATP11C","ATP11C,MCF2","ATP12A","ATP13A1","ATP13A1,LOC101750514","ATP13A2","ATP13A2,MFAP2","ATP13A3","ATP13A3,ATP13A4,LOC100857508,LOC101751772","ATP13A3,ATP13A4,LOC101751772","ATP13A3,LOC100857508","ATP13A3,LOC100857508,LOC101751772","ATP13A3,LOC100857508,LOC101751772,LRRC15","ATP13A3,LOC101751772","ATP13A4","ATP13A5","ATP1A1","ATP1A2","ATP1A3","ATP1B1","ATP1B3","ATP1B3,GRK7,LOC101748452","ATP1B3,GRK7,RNF7","ATP1B3,LOC101748452","ATP1B3,RNF7","ATP1B4","ATP2A2","ATP2A3","ATP2B1","ATP2B2","ATP2B4","ATP2C1","ATP2C2","ATP2C2,WFDC1","ATP4B","ATP5A1","ATP5A1,PSTPIP2","ATP5A1W","ATP5B","ATP5B,NACA","ATP5B,NACA,PRIM1","ATP5B,NACA,PTGES3","ATP5B,PTGES3","ATP5C1","ATP5C1,ITIH2","ATP5D","ATP5E","ATP5F1","ATP5F1,C26H6orf132","ATP5G1","ATP5G1,UBE2Z","ATP5G3","ATP5G3,LOC100858395","ATP5H","ATP5I","ATP5I,TMEM175","ATP5J","ATP5J2","ATP5J2,LOC101748822","ATP5J2,LOC101748822,PTCD1","ATP5J2,PTCD1","ATP5L,LOC428244,MLL,UBE4A","ATP5L,LOC428244,UBE4A","ATP5L,MLL,UBE4A","ATP5L,UBE4A","ATP5L,UBE4A,USP28","ATP5O","ATP5S","ATP6,ATP8,COX1,COX2,COX3,CYTB,ND1,ND2","ATP6,ATP8,COX1,COX2,COX3,CYTB,ND1,ND2,ND3,ND4,ND4L,ND5","ATP6,ATP8,COX1,COX2,COX3,CYTB,ND1,ND2,ND4,ND4L,ND5","ATP6,ATP8,COX1,COX2,COX3,CYTB,ND1,ND2,ND5","ATP6,ATP8,COX1,COX2,COX3,CYTB,ND2,ND3,ND4,ND4L,ND5","ATP6,ATP8,COX1,COX2,COX3,CYTB,ND3,ND4,ND4L,ND5","ATP6,ATP8,COX1,COX2,COX3,CYTB,ND4,ND4L,ND5","ATP6,ATP8,COX1,COX2,COX3,ND1,ND2","ATP6,ATP8,COX1,COX2,COX3,ND1,ND2,ND3,ND4,ND4L","ATP6,ATP8,COX1,COX2,COX3,ND1,ND2,ND3,ND4,ND4L,ND5","ATP6,ATP8,COX1,COX2,COX3,ND1,ND2,ND5","ATP6,ATP8,COX1,COX2,COX3,ND3,ND4,ND4L","ATP6,ATP8,COX1,COX3,CYTB,ND1,ND2,ND3,ND4,ND4L","ATP6,ATP8,COX1,COX3,CYTB,ND1,ND2,ND3,ND4,ND4L,ND5","ATP6,ATP8,COX1,COX3,CYTB,ND1,ND2,ND4,ND4L,ND5","ATP6,ATP8,COX1,COX3,CYTB,ND2,ND3,ND4,ND4L,ND5","ATP6,ATP8,COX1,COX3,CYTB,ND3","ATP6,ATP8,COX1,COX3,ND1,ND2","ATP6,ATP8,COX1,COX3,ND1,ND2,ND3,ND4,ND4L","ATP6,ATP8,COX2,COX3,CYTB,ND3,ND4,ND4L,ND5","ATP6,ATP8,COX3","ATP6,ATP8,COX3,CYTB,ND1,ND2,ND3,ND4,ND4L,ND5","ATP6,ATP8,COX3,CYTB,ND1,ND2,ND5","ATP6,ATP8,COX3,CYTB,ND3,ND4,ND4L,ND5","ATP6,ATP8,COX3,ND1,ND2,ND3,ND4,ND4L","ATP6,ATP8,COX3,ND1,ND2,ND4,ND4L","ATP6,ENSGALG00000018359,ENSGALG00000018362,ENSGALG00000018363,ENSGALG00000018365,ENSGALG00000018369,ENSGALG00000018371,ENSGALG00000018383,ENSGALG00000018384,ENSGALG00000018385,ENSGALG00000018386,ENSGA","ATP6AP1","ATP6AP1,IQUB","ATP6AP1,IQUB,NDUFA5","ATP6AP1,SLC13A1","ATP6AP1L","ATP6AP2","ATP6V0A1","ATP6V0A1,HSD17B1,MLX","ATP6V0A1,MLX","ATP6V0A1,MLX,TUBG1","ATP6V0A2","ATP6V0A2,DDX55,GTF2H3,TCTN2,TMED2","ATP6V0A2,DNAH10","ATP6V0A2,GTF2H3,TCTN2","ATP6V0A2,TCTN2","ATP6V0A4","ATP6V0A4,KIAA1549","ATP6V0B","ATP6V0B,B4GALT2","ATP6V0B,IPO13","ATP6V0C","ATP6V0C,C14H8ORF33","ATP6V0C,TBC1D24","ATP6V0D1","ATP6V0D2","ATP6V0E1","ATP6V0E1,C13H5ORF41,RPL26L1","ATP6V0E1,ERGIC1","ATP6V0E1,RPL26L1","ATP6V0E2","ATP6V0E2,COX15","ATP6V0E2,SLC25A28","ATP6V1A","ATP6V1B2","ATP6V1B2,TTI2","ATP6V1C1","ATP6V1C2","ATP6V1D","ATP6V1D,LOC101749936","ATP6V1E1","ATP6V1G1","ATP6V1G1,C17H9ORF91","ATP6V1G3","ATP6V1H","ATP7A,LOC771947,PGK1","ATP7A,PGK1","ATP7B","ATP8A1","ATP8A2","ATP8B1","ATP8B1,NARS","ATP8B2","ATP8B2,LOC100857999,PBXIP1,PMVK","ATP8B2,SHC1","ATP8B3","ATP8B3,MIR1647","ATP8B3,MIR1647,REXO1","ATP8B3,REXO1","ATP9A","ATP9A,NFATC2","ATP9B","ATPAF1","ATPAF1,KIAA0494","ATPAF1,MOBKL2C","ATPAF1,PDZK1IP1","ATPAF2","ATPBD4","ATR","ATR,XRN1","ATRIP","ATRN","ATRNL1","ATRX","ATRX,MAGT1","ATXN1","ATXN10","ATXN1L","ATXN1L,IST1","ATXN2","ATXN3","ATXN3,NDUFB1","ATXN3,TRIP11","ATXN7","ATXN7L1","AUH","AUP1","AUP1,DQX1","AURKA","AURKAIP1","AURKAIP1,CCNL2","AURKAIP1,LOC771069","AURKAIP1,MXRA8","AUTS2","AUTS2,MIR1587","AVD","AVD,AVR2","AVD,AVR2,LOC431660,LOC769899","AVD,AVR2,LOC769899","AVD,LOC431660,LOC769899","AVD,LOC769899","AVD,TLN1","AVEN","AVL9","AVP","AVP,FASTKD5,UBOX5","AVP,OXT","AVPR1A","AVPR1B","AVPR1B,CTSE","AVPR2","AVR2","AVR2,LOC431660","AXDND1","AXDND1,SOAT1","AXIN1","AXIN1,RGS11","AXIN2","AXIN2,CEP112","AZI1","AZI1,C17ORF56","AZI1,C17ORF56,SLC38A10","AZI1,LOC422075","AZI1,SLC38A10","AZI2","AZIN1","AZIN1,KLF10","B-G","B-G,BG2","B-G,BG2,KIFC1,LOC100858529,LOC100858813,LOC101747935,LOC101748132,LOC101748252,LOC101748559,LOC101750077,LOC101750140,LOC101750190,LOC425214,LOC768349,LOC768351","B-G,BG2,KIFC1,LOC100858529,LOC100858813,LOC101747935,LOC101748132,LOC101748252,LOC101748559,LOC101750077,LOC101750190,LOC425214,LOC768349,LOC768351","B-G,BG2,LOC100858529","B-G,BG2,LOC100858529,LOC100858813,LOC101747935,LOC101748132,LOC101748252");
//array();
  //  while($row = mysqli_fetch_assoc($result))
    //{
      //  $dname_list[] = $row['species'];
   // }
    echo json_encode($dname_list);
?>
