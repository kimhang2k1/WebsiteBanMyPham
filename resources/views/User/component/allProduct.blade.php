
                @if (count($productbyId)>0) 
                @for($i = 0;$i < count($productbyId); $i++)
                    <div class="product-frame">
                        <div class="images">
                           <a href = "{{ url('sanpham/thongtinsanpham/'.$productbyId[$i]->IDSanPham.'&&'.$productbyId[$i]->IDNhomSP) }}"> <img src="/img/{{ $productbyId[$i]->HinhAnh }}"></a>
                        </div>
                        <div class="name">
                            <h3>
                                <a href = "{{ url('sanpham/thongtinsanpham/'.$productbyId[$i]->IDSanPham.'&&'.$productbyId[$i]->IDNhomSP) }}" style = "text-decoration:none;"><p>{{ $productbyId[$i]->TenSanPham }}</p></a>
                            </h3>
                        </div>
                        <div class="price">
                        <span>{{ number_format($productbyId[$i]->GiaSP * 0.9)}}</span>
                        <strike>{{ number_format($productbyId[$i]->GiaSP) }}</strike>
                        </div>
                        <div class="button-cart">
                            <a href="{{ url('sanpham/thongtinsanpham/'.$productbyId[$i]->IDSanPham.'&&'.$productbyId[$i]->IDNhomSP) }}" style = "text-decoration:none;">
                                <p> Xem Chi Tiết</p>
                            </a>
                        </div>
                    </div>
                    @endfor
                @else
                @endif