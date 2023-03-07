<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>

    <link rel="stylesheet" href="style.css">
    <title>Biodata</title>
</head>

<body>
    <?php
    $tglLahir = new DateTime('2002-09-16');
    $tglSekarang = new DateTime('today');
    $umur = $tglSekarang->diff($tglLahir)->y;

    $nama = "MUHAMMAD BAGAS SEPTYONO";
    $alamat = "Bumi Suko Indah, Sidoarjo";
    $no_telp = "+6281230073664";
    $email = "muhammadbagasmbs@gmail.com";

    $pendidikan = array('UNIVERSITAS PEMBANGUNAN NASIONAL “VETERAN” JAWA TIMUR','SMK NEGERI 3 BUDURAN SIDOARJO','SMP NEGERI 4 SIDOARJO','SDN CEMENGKALANG SIDOARJO');
    $hobi = array('SEPAKBOLA/FUTSAL','TRAVELLING');


    ?>
    <div class="container">
        <nav>
            <h2 class="label"><a href="biodata.html">Biodata</a> </h2>
            <ul>
                <li><a href="#skill">Skill</a></li>
                <li><a href="#pendidikan">Pendidikan</a></li>
                <li><a href="#hobi">Hobi</a></li>
            </ul>
        </nav>
        <div class="hero">
            <div class="bungkusHero">
                <div class="gambar"></div>
                <div class="data">
                    <h1><?php echo $nama;?></h1>
                    <hr>
                    <div class="subtitle">Mahasiswa UPN Veteran Jawa Timur</div>
                    <div class="detail">
                        <ul>
                            <li>Umur</li>
                            <li>Alamat</li>
                            <li>No.Hp</li>
                            <li>Email</li>
                        </ul>
                        <ul class="keterangan">
                            <li><?php echo $umur?> Tahun</li>
                            <li><?php echo $alamat?></li>
                            <li><?php echo $no_telp?></li>
                            <li><?php echo $email?></li>
                        </ul>
                    </div>
                    <p>Saya Bagas, mahasiswa semester 4 Fakultas Ilmu Komputer <?php echo $pendidikan[0]?>. Saya sedang
                        menekuni bidang web development.</p>
                    <div class="link">
                        <a href="https://github.com/bagasseptyono" target="_blank"><i class="fa-brands fa-github"></i></a>
                        <a href="https://www.linkedin.com/in/muhammad-bagas-a49178171/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="https://www.instagram.com/muhammadbagas16/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                        <a href="https://twitter.com/bagasseptyonoo"><i class="fa-brands fa-square-twitter" target="_blank"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Skill -->
        <div class="skill" id="skill">
            <h1>SKILLS</h1>
            <div class="bungkusSkill">
                <div class="dataskill">
                    <img src="img/webdev.png" alt="">
                    <p>Web Dev. Membuat sebuah web CRUD sederhana dengan php.</p>
                </div>
                <div class="dataskill">
                    <img src="img/webdesign.png" alt="">
                    <p>Web Desain. Mendesain sebuah website sederhana seperti portofolio.</p>
                </div>
                <div class="dataskill">
                    <img src="img/cpp.png" alt="">
                    <p>Program C++. Membuat sebuah program C++ sederhana.</p>
                </div>
                <div class="dataskill">
                    <img src="img/nodejs.jpg" alt="">
                    <p>Node Js. Pemula membuat API sederhana dengan NodeJs.</p>
                </div>
            </div>
        </div>



        <!-- Pendiidkan -->
        <div class="pendidikan" id="pendidikan">
            <h1>PENDIDIKAN</h1>
            <div class="data-pendidikan">
                <div class="jenjang"><?php echo $pendidikan[0]?></div>
                <div class="tahun">2021 - Sekarang</div>
            </div>
            <div class="data-pendidikan">
                <div class="jenjang"><?php echo $pendidikan[1]?></div>
                <div class="tahun">2018 - 2021</div>
            </div>
            <div class="data-pendidikan">
                <div class="jenjang"><?php echo $pendidikan[2]?></div>
                <div class="tahun">2015 - 2018</div>
            </div>
            <div class="data-pendidikan">
                <div class="jenjang"><?php echo $pendidikan[3]?></div>
                <div class="tahun">2009 - 2015</div>
            </div>
        </div>


        <!-- hobi -->
        <div class="hobi" id="hobi">
            <div class="bungkus-hobi">
                <div class="kiri">
                    <h1>HOBI</h1>
                    <p>Hobi yang saya minati adalah bermain sepakbola/futsal. Sepakbola sudah menjadi setengah dari
                        hidup saya karena dari kecil telah menekuni olahraga ini. Selain itu, traveling juga menjadi
                        kesenangan. Karena dengan traveling dapat menikmati perjalanan dan keindahan daerah di
                        Indonesia.</p>
                </div>
                <div class="kanan">
                    <div class="item">
                        <img src="img/futsal.png" alt="">
                        <div class="title"><?php echo $hobi[0]?></div>
                    </div>
                    <div class="item">
                        <img src="img/travel.png" alt="">
                        <div class="title"><?php echo $hobi[1]?></div>
                    </div>
                </div>
            </div>

        </div>
        <footer>
            Muhammad Bagas Septyono | 21081010049
        </footer>
    </div>

</body>

</html>