<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title></title>
      <link rel="stylesheet" href="">
   </head>
   <body>
   <a href="#" onclick="window.print();">In</a>
      <table class="contentpaneopen">
         <tbody>
            <tr>
               <td valign="top">
                  <table class="MsoTableGrid" style="width: 100.0%; border-collapse: collapse; mso-yfti-tbllook: 480; mso-padding-alt: 0in 5.4pt 0in 5.4pt;" border="0" cellspacing="0" cellpadding="0" width="100%">
                     <tbody>
                        <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;">
                           <td style="width: 369.7pt; padding: 0in 5.4pt 0in 5.4pt;" width="493" valign="top">
                              <p class="MsoNormal"><strong><span style="font-size: 10.0pt; font-family: Verdana;">Đơn   vi:………..</span></strong></p>
                              <p class="MsoNormal"><strong><span style="font-size: 10.0pt; font-family: Verdana;">Bộ   phận:……….</span></strong></p>
                           </td>
                           <td style="width: 369.7pt; padding: 0in 5.4pt 0in 5.4pt;" width="493" valign="top">
                              <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="font-size: 10.0pt; font-family: Verdana;">Mẫu số: 02 - VT</span></strong></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">(Ban hành theo QĐ số:   48/2006/QĐ- BTC</span></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">Ngày 14/9/2006 của Bộ trưởng   BTC)</span></p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <table class="MsoTableGrid" style="width: 100.0%; border-collapse: collapse; mso-yfti-tbllook: 480; mso-padding-alt: 0in 5.4pt 0in 5.4pt;" border="0" cellspacing="0" cellpadding="0" width="100%">
                     <tbody>
                        <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;">
                           <td style="width: 174.5pt; padding: 0in 5.4pt 0in 5.4pt;" width="233" valign="top">
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;"> </span></p>
                           </td>
                           <td style="width: 174.5pt; padding: 0in 5.4pt 0in 5.4pt;" width="233" valign="top">
                              <p class="MsoNormal" style="text-align: center;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="font-size: 10.0pt; font-family: Verdana;">PHIẾU XUẤT KHO</span></strong></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">Ngày {{ $carbon::now()->day }} tháng {{ $carbon::now()->month }} năm {{ $carbon::now()->year }} </span></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">Số {{ uniqid('HD') }}</span></p>
                           </td>
                           <td style="width: 174.55pt; padding: 0in 5.4pt 0in 5.4pt;" width="233" valign="top">
                              <p class="MsoNormal" style="text-align: center;" align="center"><em><span style="font-size: 10.0pt; font-family: Verdana;">Nợ..........................</span></em></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><em><span style="font-size: 10.0pt; font-family: Verdana;">Có.</span></em><span style="font-size: 10.0pt; font-family: Verdana;">..........................</span></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;"> </span></p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <p>&nbsp;</p>
                  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;"> </span></p>
                  <p class="MsoNormal" style="margin-left: 16.35pt;"><span style="font-size: 10.0pt; font-family: Verdana;">- Họ và tên người nhận hàng: {{ $bill->user->name }}       Địa chỉ (bộ phận) {{ $bill->user->address }} </span></p>
                  <p class="MsoNormal" style="margin-left: 16.35pt;"><span style="font-size: 10.0pt; font-family: Verdana;">- Lý do xuất kho: Xuất hàng cho khách</span></p>
                  <p class="MsoNormal" style="margin-left: 16.35pt;"><span style="font-size: 10.0pt; font-family: Verdana;">- Xuất tại kho (ngăn lô): Lô B{{ rand(1, 10) }}         Địa điểm: 25/5 Nguyên Thị Thập, Trung Hóa, Thanh Xuân, Hà Nội</span></p>
                  <p class="MsoNormal"><span style="font-size: 10.0pt; font-family: Verdana;"> </span></p>
                  <p>&nbsp;</p>
                  <table class="MsoTableGrid" style="width: 100.0%; border-collapse: collapse; border: none; mso-border-alt: solid windowtext .5pt; mso-yfti-tbllook: 480; mso-padding-alt: 0in 5.4pt 0in 5.4pt; mso-border-insideh: .5pt solid windowtext; mso-border-insidev: .5pt solid windowtext;" border="1" cellspacing="0" cellpadding="0" width="100%">
                     <tbody>
                        <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes;">
                           <td style="width: 35.7pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt;" rowspan="2" width="48">
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">STT</span></p>
                           </td>
                           <td style="width: 209.55pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt;" rowspan="2" width="279">
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">Tên, nhãn hiệu quy cách, phẩm   chất vật tư, dụng cụ sản phẩm, hàng hóa</span></p>
                           </td>
                           <td style="width: 43.6pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt;" rowspan="2" width="58">
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">Mã <br> số</span></p>
                           </td>
                           <td style="width: 35.35pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt;" rowspan="2" width="47">
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">Đơn vị tính</span></p>
                           </td>
                           <td style="width: 125.35pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt;" colspan="2" width="167">
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">Số lượng</span></p>
                           </td>
                           <td style="width: 49.05pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt;" rowspan="2" width="65">
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">Đơn giá</span></p>
                           </td>
                           <td style="width: 49.05pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt;" rowspan="2" width="65">
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">Thành tiền</span></p>
                           </td>
                        </tr>
                        <tr style="mso-yfti-irow: 1; height: 55.45pt;">
                           <td style="width: 65.4pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 55.45pt;" width="87">
                              <p class="MsoNormal" style="margin-right: -1.05pt; text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">Yêu <br> cầu</span></p>
                           </td>
                           <td style="width: 59.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 55.45pt;" width="80">
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">Thực <br>xuất</span></p>
                           </td>
                        </tr>
                        @foreach ($bill->billDetails as $billDetail)
                            <tr style="mso-yfti-irow: 3; height: 63.7pt;">
                               <td style="width: 35.7pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 63.7pt;" width="48">
                                  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;"> {{ $billDetail->id }} </span></p>
                               </td>
                               <td style="width: 209.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 63.7pt;" width="279">
                                        <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;"> {{ $billDetail->item->name }} </span></p>
                               </td>
                               <td style="width: 43.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 63.7pt;" width="58">
                                  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">{{ $billDetail->item->id }} </span></p>
                               </td>
                               <td style="width: 35.35pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 63.7pt;" width="47">
                                  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;"> Chiếc </span></p>
                               </td>
                               <td style="width: 65.4pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 63.7pt;" width="87">
                                  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">{{ $billDetail->quality }} </span></p>
                               </td>
                               <td style="width: 59.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 63.7pt;" width="80">
                                  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">{{ $billDetail->quality }} </span></p>
                               </td>
                               <td style="width: 49.05pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 63.7pt;" width="65">
                                  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">{{ number_format($billDetail->item->price) }} </span></p>
                               </td>
                               <td style="width: 49.05pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 63.7pt;" width="65">
                                  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">{{ number_format($billDetail->item->price * $billDetail->quality) }} </span></p>
                               </td>
                            </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <p>&nbsp;</p>
                  <p class="MsoNormal"><span style="font-size: 10.0pt; font-family: Verdana;"><span style="mso-tab-count: 1;"> </span>- Tổng số tiền ( viết bằng số ): {{ number_format($bill->total) }}</span></p>
                  <p class="MsoNormal"><span style="font-size: 10.0pt; font-family: Verdana;"> </span></p>
                  <p class="MsoNormal" style="text-align: right;" align="right"><em><span style="font-size: 10.0pt; font-family: Verdana;">Ngày {{ $carbon::now()->day }} tháng {{ $carbon::now()->month }} năm {{ $carbon::now()->year }} </span></em></p>
                  <p class="MsoNormal"><span style="font-size: 10.0pt; font-family: Verdana;"> </span></p>
                  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;"> </span></p>
                  <p>&nbsp;</p>
                  <table class="MsoTableGrid" style="width: 100.0%; border-collapse: collapse; mso-yfti-tbllook: 480; mso-padding-alt: 0in 5.4pt 0in 5.4pt;" border="0" cellspacing="0" cellpadding="0" width="100%">
                     <tbody>
                        <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;">
                           <td style="width: 104.7pt; padding: 0in 5.4pt 0in 5.4pt;" width="140" valign="top">
                              <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="font-size: 10.0pt; font-family: Verdana;">Người lập phiếu</span></strong></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">(Ký, họ tên)</span></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;"> </span></p>
                           </td>
                           <td style="width: 104.7pt; padding: 0in 5.4pt 0in 5.4pt;" width="140" valign="top">
                              <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="font-size: 10.0pt; font-family: Verdana;">Người nhận hàng</span></strong></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">(Ký, họ tên)</span></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;"> </span></p>
                           </td>
                           <td style="width: 104.7pt; padding: 0in 5.4pt 0in 5.4pt;" width="140" valign="top">
                              <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="font-size: 10.0pt; font-family: Verdana;">Thủ kho</span></strong></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">(Ký, họ tên)</span></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;"> </span></p>
                           </td>
                           <td style="width: 104.7pt; padding: 0in 5.4pt 0in 5.4pt;" width="140" valign="top">
                              <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="font-size: 10.0pt; font-family: Verdana;">Kế toán trưởng</span></strong></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="font-size: 10.0pt; font-family: Verdana;">(Hoặc bộ phận có nhu cầu nhập)</span></strong></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;">(Ký, họ tên)</span></p>
                              <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 10.0pt; font-family: Verdana;"> </span></p>
                           </td>
                           <td style="width: 104.75pt; padding: 0in 5.4pt 0in 5.4pt;" width="140" valign="top">
                              <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="font-size: 10.0pt; font-family: Verdana;">Giám đốc</span></strong><span style="font-size: 10.0pt; font-family: Verdana;"><span style="mso-spacerun: yes;"> </span><span style="mso-spacerun: yes;"> </span><br>(Ký, họ tên)</span></p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <img src="/" border="0" alt="Mẫu số 02 - VT : PHIẾU XUẤT KHO" style="display:none">
               </td>
            </tr>
         </tbody>
      </table>
   </body>
</html>