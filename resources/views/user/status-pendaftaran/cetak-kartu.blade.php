<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Kartu Registrasi Mahasiswa</title>
    <style>
        @font-face {
            font-family: "source_sans_proregular";
            src: local("Source Sans Pro"), url("fonts/sourcesans/sourcesanspro-regular-webfont.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;

        }

        body {
            font-family: "source_sans_proregular", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
        }

        /* table {
            border-collapse: collapse;
            width: 100%;
        } */

        /* td,
        th {
            border: 1px solid #000000;
        }

        .tablenoborder {
            border: none !important;
        } */
    </style>
</head>

<body>
    <table style="width:100%;">
        <tbody>
            <tr>
                <td rowspan="4" style="width:59.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;">
                        <img src="{{ public_path('image/Logo MBC-min.jpeg') }}" height="114" alt="">
                    </p>
                </td>
                <td style="width:350.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:22pt;"><strong><span
                                style="font-family:Times New Roman,serif;">Lembaga Kursus dan Pelatihan</span></strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:350.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:18pt;"><span
                            style="font-family:Times New Roman,serif;"><strong>Mulya Bhakti Computer</strong></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:350.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><span
                            style="font-family:Times New Roman,serif;">Jl. Raya Leuwigoong, Cibiuk Kaler, Kec. Cibiuk,
                            Kabupaten Garut, Jawa Barat 44193</span></p>
                </td>
            </tr>
        </tbody>
    </table>

    <hr style="height:2px; border-width:0; color:black; background-color:black">

    <table style="width:496.2pt;margin-left:16pt;border-collapse:collapse;border: none;">
        <tbody>
            <tr>
                <td rowspan="9" style="width: 111.95pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0.5cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>
                            <div
                                style="
                            height: 150px;
                            border: 1px solid #000;
                            background: #fff;
                            margin: auto;
                            padding: 1px 1px;">
                                <img src="{{ storage_path('app/public/' . $student->foto) }}" alt=""
                                    width="110" height="130" alt=""
                                    style="width: 100%;
                                    height: 100%;">
                        </span>
                        </div>
                    </p>
                </td>
                <td style="width: 143.25pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>Nama</span>
                    </p>
                </td>
                <td style="width: 14.2pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>:</span>
                    </p>
                </td>
                <td style="width: 8cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span
                            style='font-size:19px;font-family:"Times New Roman",serif;'>{{ $student->nama_siswa }}</span>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 143.25pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>Email</span>
                    </p>
                </td>
                <td style="width: 14.2pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>:</span>
                    </p>
                </td>
                <td style="width: 8cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span
                            style='font-size:19px;font-family:"Times New Roman",serif;'>{{ $student->email_user }}</span>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 143.25pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>Tempat Tanggal Lahir</span>
                    </p>
                </td>
                <td style="width: 14.2pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>:</span>
                    </p>
                </td>
                <td style="width: 8cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span
                            style='font-size:19px;font-family:"Times New Roman",serif;'>{{ $student->tempat_lahir . ', ' . \Carbon\Carbon::parse($student->tanggal_lahir)->isoFormat('D MMMM Y') }}</span>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 143.25pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>Jenis Kelamin</span>
                    </p>
                </td>
                <td style="width: 14.2pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>:</span>
                    </p>
                </td>
                <td style="width: 8cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span
                            style='font-size:19px;font-family:"Times New Roman",serif;'>{{ $student->jenis_kelamin == 'l' ? 'Laki - Laki' : 'Perempuan' }}</span>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 143.25pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>Alamat</span>
                    </p>
                </td>
                <td style="width: 14.2pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>:</span>
                    </p>
                </td>
                <td style="width: 8cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>{{ $student->alamat }}</span>
                    </p>
                </td>
            </tr>


            <tr>
                <td style="width: 143.25pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman,serif;'>&nbsp;</span>
                    </p>
                </td>
                <td style="width: 14.2pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman,serif;'>&nbsp;</span>
                    </p>
                </td>
                <td style="width: 8cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman,serif;'>&nbsp;</span>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <br>
    <br>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style='font-size:19px;font-family:"Times New Roman",serif;'>Rincian Pembayaran</span>
    </p>
    <br>
    <table style="width:496.2pt;margin-left:16pt;border-collapse:collapse;" border=1>
        <tbody>
            <tr>
                <td style="width: 143.25pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span
                            style='font-size:19px;font-family:"Times New Roman",serif;'>{{ $student->keterangan }}</span>
                    </p>
                </td>
                <td style="width: 14.2pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>:</span>
                    </p>
                </td>
                <td style="width: 8cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span
                            style='font-size:19px;font-family:"Times New Roman",serif;'>{{ 'Rp ' . number_format($student->nominal, 2, ',', '.') }}</span>
                    </p>
                    <hr style="height:1px; border-width:0; color:black; background-color:black">
                </td>
            </tr>
            <tr>
                <td style="width: 143.25pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'><strong>Total</strong></span>
                    </p>
                </td>
                <td style="width: 14.2pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman",serif;'>:</span>
                    </p>
                </td>
                <td style="width: 8cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span
                            style='font-size:19px;font-family:"Times New Roman",serif;'><strong>{{ 'Rp ' . number_format($student->nominal, 2, ',', '.') }}</strong></span>
                    </p>
                </td>
            </tr>


            <tr>
                <td style="width: 143.25pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman,serif;'>&nbsp;</span>
                    </p>
                </td>
                <td style="width: 14.2pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman,serif;'>&nbsp;</span>
                    </p>
                </td>
                <td style="width: 8cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:19px;font-family:"Times New Roman,serif;'>&nbsp;</span>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>


    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:Arial;">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>


    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:Arial;">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
    <table width="100%">
        <tbody>
            <tr>
                <td style="width:207.25pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial;">&nbsp;</span></p>
                </td>
                <td style="width:212.5pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial;">Garut, {{ $tanggal }}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:207.25pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span
                            style="font-family:Arial;">&nbsp;</span></p>
                </td>
                <td style="width:212.5pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial;">Bendahara</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial;">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial; color:#eeece1;">(Tanda tangan)</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial;">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial;">_____________________________</span></p>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
