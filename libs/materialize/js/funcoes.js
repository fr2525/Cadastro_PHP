    function critica() {

        var form = document.querySelector("#formCliente");

        var cliente = {
            cpf: form.cpfcnpj.value,
            nome: form.nome.value,
            datanasc: form.datanasc.value,
            valor: form.valor.value,
            datavenc: form.datavenc.value
        };

        if (cliente.cpf.trim() !== "") {
            if (!validaCPF(cliente.cpf)) {
                if (!ValidarCNPJ(cliente.cpf)) {

                    toastr.warning("CPF/CNPJ inválido");
                    $("#cpfcnpj").setfocus();
                    return false;
                }
            }

            if (!validaData(cliente.datanasc)) {
                toastr.warning("Data de Nascto. inválida");
                $("#datanasc").setfocus();
                return false;
            }

            if (!validaData(cliente.datavenc)) {
                toastr.warning("Dta.Vencto. inválida");
                $("#datavenc").setfocus();
                return false;
            };

            if (cliente.valor < 0) {
                toastr.warning("Valor Inválido");
                $("#valor").setfocus();
                return false;
            };

        };
    }

    function validaCPF(c) {
        //arquivo funcoes_cpf.js
        // validador CPF
        var i;
        s = c;
        var c = s.substr(0, 9);
        var dv = s.substr(9, 2);
        var d1 = 0;
        var v = false;
        
        //alert("1");
        
        for (i = 0; i < 9; i++) {
            d1 += c.charAt(i) * (10 - i);
        }
        
        //alert("2");
        
        if (d1 == 0) {
            alert("CPF Inválido")
            v = true;
            return false;
        }
        d1 = 11 - (d1 % 11);
        
        //alert("3");
        
        if (d1 > 9) {
            d1 = 0;
        }     
        
        //alert("4");
        
        if (dv.charAt(0) != d1) {
            alert("CPF Inválido")
            v = true;
            return false;
        }
        
        //alert("5");
        
        d1 *= 2;
        for (i = 0; i < 9; i++) {
            d1 += c.charAt(i) * (11 - i);
        }
        d1 = 11 - (d1 % 11);
        if (d1 > 9) {
            d1 = 0;
        }    

        //alert("6");

        if (dv.charAt(1) != d1) {
            alert("CPF Inválido")
            v = true;
            return false;
        }
        if (!v) {
            alert(c + "nCPF Válido")
            return true;
        }
    }


    /*
            var result = true;
            alert("cpf.length = " + cpf.length);
            if (cpf.length > 0) {
                cpf = cpf.replace(/\D/g, '');
                alert("cpf = " + cpf);
                if (cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
                result = true;
                [9, 10].forEach(function(j) {
                    var soma = 0,
                     r;
                    cpf.split(/(?=)/).splice(0, j).forEach(function(e, i) {
                        soma += parseInt(e) * ((j + 2) - (i + 1));
                    });
                    r = soma % 11;
                    r = (r < 2) ? 0 : 11 - r;
                    if (r != cpf.substring(j, j + 1)) result = false;
                });
            }
            alert( "result = " + result);
            return result;

        }

        */

    //valida data
    function ValidaData(data) {
        exp = /\d{2}\/\d{2}\/\d{4}/
        if (!exp.test(data.value))
            return false;
    }

    //valida o CNPJ digitado
    function ValidarCNPJ(ObjCnpj) {
        var cnpj = ObjCnpj.value;
        var valida = new Array(6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2);
        var dig1 = new Number;
        var dig2 = new Number;

        exp = /\.|\-|\//g
        cnpj = cnpj.toString().replace(exp, "");
        var digito = new Number(eval(cnpj.charAt(12) + cnpj.charAt(13)));

        for (i = 0; i < valida.length; i++) {
            dig1 += (i > 0 ? (cnpj.charAt(i - 1) * valida[i]) : 0);
            dig2 += cnpj.charAt(i) * valida[i];
        }
        dig1 = (((dig1 % 11) < 2) ? 0 : (11 - (dig1 % 11)));
        dig2 = (((dig2 % 11) < 2) ? 0 : (11 - (dig2 % 11)));

        if (((dig1 * 10) + dig2) != digito)
            return false;

    }
