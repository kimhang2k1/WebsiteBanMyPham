<select>
                   @foreach($quan as $q)
                        <option name = "district-2">{{ $q->TenQuan}}</option>
                    @endforeach
                  </select>