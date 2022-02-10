@extends('pages.layouts.app')
@section('content-index')
    @include('pages.tickets.ticket-banner')
    <section class="section appoinment">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="appoinment-content">
                        <img src="#" alt="" class="img-fluid">
                        <div class="emergency">
                            <a href="https://api.whatsapp.com/send?text={{urlencode(url()->current()) }}"><i class="fab fa-whatsapp"></i><h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>+23 345 67980</h2></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-10 ">
                    <div class="appoinment-wrap mt-5 mt-lg-0">
                        <h2 class="mb-2 title-color">Nikmati Perjalanan Kamu, dengan Cari Tujuan Kamu</h2>
                        <p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.</p>
                        <form id="#" class="appoinment-form" method="post" action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control fromText" id="exampleFormControlSelect1">
                                            <option>Jakarta</option>
                                            <option>Bandung</option>
                                            <option>Surabaya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control toText" id="exampleFormControlSelect2">
                                            <option>Bandung</option>
                                            <option>Jakarta</option>
                                            <option>Surabaya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-main btn-round-full col-12" href="appoinment.html" >Make Appoinment <i class="icofont-simple-right ml-2  "></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="row mt-2">
                <div class="feature col-lg-12">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            getTicket();
        })

        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                rupiah     		= split[0].substr(0, sisa),
                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        $(document).on('change', function(){
            getTicket($('.fromText').val(), $('.toText').val())
        });

        function getTicket(from=null, to=null) {
            let url = '{{ ENV("APP_URL_TICKET") }}'+ 'ticket/get-list';
            $.ajax({
                type: 'GET',
                data: {
                    from: from,
                    to: to
                },
                url: url,
                success: function(params) {
                    console.log(params.data);
                    let ticketList = params.data;
                    let ticketCard = $('.feature');
                    console.log(ticketList);
                    ticketCard.empty().append()
                    ticketList.forEach((result) => {
                        let htmlTicket = '<div class="feature-block mb-3 d-lg-flex">\
                                                <div class="feature-item mb-5 mb-lg-0">\
                                                    <div class="feature-icon mb-4">\
                                                         <i class="icofont-surgeon-alt"></i>\
                                                    </div>\
                                                    <span>From</span>\
                                                    <h4 class="mb-3">'+result.from+' - '+result.to+'</h4>\
                                                    <h4 class="mb-3">Stock Ticket</h4><label class="mb-4">'+result.ticket_stock+'</label>\
                                                    <br>\
                                                    <a href="appoinment.html" class="btn btn-main btn-round-full">Make a appoinment</a>\
                                                </div>\
                                          <div class="feature-item mb-5 mb-lg-0">\
                                            <div class="feature-icon mb-4">\
                                            <i class="icofont-ui-clock"></i>\
                                          </div>\
                                            <span>Timing schedule</span>\
                                            <h4 class="mb-3">Working Hours</h4>\
                                            <h4 class="mb-3">Harga </h4><label class="mb-4">Rp. '+formatRupiah(result.price)+'</label>\
                                          <ul class="w-hours list-unstyled">\
                                                <li class="d-flex justify-content-between">Sun - Wed : <span>'+result.time+' - '+result.time+'</span></li>\
                                          </ul>\
                                    </div>\
                            </div>';
                        ticketCard.append(htmlTicket);
                    })
                }
            })
        }
    </script>
@endpush
