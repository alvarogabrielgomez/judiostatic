using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using PdfSharp.Drawing;
using PdfSharp.Pdf;

namespace GestaoGarantiasWebForms.Classes
{
    public class GerarPDF
    {
        public bool RevisaoEntrega(string nome, string documento, string numerovenda, string descricao, string fileoutput)
        {
            bool retorno = false;
            double espacamentoentregrupos = 20;
            double y = 30;
            var x = 30;


            var doc = new PdfDocument();
            var page = doc.AddPage();
            var graphics = XGraphics.FromPdfPage(page);
            var textFormatter = new PdfSharp.Drawing.Layout.XTextFormatter(graphics);
            var fontTitulo = new XFont("Arial", 16, XFontStyle.Bold);
            var fontTexto = new XFont("Arial", 10);
            var fontRodape = new XFont("Arial", 8);
            var fontTituloTexto = new XFont("Arial", 12, XFontStyle.Bold);
            var fontItens = new XFont("Arial", 10, XFontStyle.Italic);

            //CONTORNO DA FOLHA
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(20, 20, page.Width - 40, page.Height - 40));

            //TITULO
            textFormatter.Alignment = PdfSharp.Drawing.Layout.XParagraphAlignment.Center;
            textFormatter.DrawString("REVISÃO DE ENTREGA", fontTitulo, XBrushes.Black, new XRect(x, y, page.Width - 60, page.Height - 60));

            //DADOS DO CLIENTE
            textFormatter.Alignment = PdfSharp.Drawing.Layout.XParagraphAlignment.Left;
            y += espacamentoentregrupos + 10;
            textFormatter.DrawString("DADOS DO CLIENTE", fontTituloTexto, XBrushes.Black, new XRect(x, y, page.Width - 10, page.Height - 10));
            y += 15;
            textFormatter.DrawString("NOME:", fontTexto, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));
            textFormatter.DrawString("DOCUMENTO:", fontTexto, XBrushes.Black, new XRect(300, y, page.Width - 10, page.Height - 10));
            y += 10;
            textFormatter.DrawString(nome, fontItens, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));
            textFormatter.DrawString(documento, fontItens, XBrushes.Black, new XRect(300, y, page.Width - 10, page.Height - 10));

            //DADOS DA VENDA
            y += espacamentoentregrupos;
            textFormatter.DrawString("DADOS DA VENDA", fontTituloTexto, XBrushes.Black, new XRect(x, y, page.Width - 10, page.Height - 10));
            y += 15;
            textFormatter.DrawString("Nº VENDA:", fontTexto, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));
            textFormatter.DrawString("DESCRIÇÃO:", fontTexto, XBrushes.Black, new XRect(100, y, page.Width - 10, page.Height - 10));
            y += 10;
            textFormatter.DrawString(numerovenda, fontItens, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));
            textFormatter.DrawString(descricao, fontItens, XBrushes.Black, new XRect(100, y, page.Width - 10, page.Height - 10));

            //CHECKLIST
            y += espacamentoentregrupos;
            textFormatter.DrawString("CHECKLIST", fontTituloTexto, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));
            y += 15;
            double alturacontorno = 405;
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(30, y, page.Width - 65, alturacontorno));
            y += 2;
            textFormatter.DrawString("ITEM", fontTexto, XBrushes.Black, new XRect(35, y, page.Width - 10, page.Height - 10));
            textFormatter.DrawString("OK", fontTexto, XBrushes.Black, new XRect(page.Width - 92, y, page.Width - 10, page.Height - 10));
            textFormatter.DrawString("NC", fontTexto, XBrushes.Black, new XRect(page.Width - 72, y, page.Width - 10, page.Height - 10));
            textFormatter.DrawString("NP", fontTexto, XBrushes.Black, new XRect(page.Width - 52, y, page.Width - 10, page.Height - 10));

            //LINHAS VERTICAIS DOS CAMPOS OK, NC, CP
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(page.Width - 95, y - 2, 0, alturacontorno));
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(page.Width - 75, y - 2, 0, alturacontorno));
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(page.Width - 55, y - 2, 0, alturacontorno));

            //ITEM DA TABELA
            double y2 = y;
            double espacolinha = 15;

            y += espacolinha + 1;
            textFormatter.DrawString("FUNCIONAMENTO DO MOTOR", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("SISTEMA DE PARTIDA", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("SISTEMA DE FREIO", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("AFOGADOR", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("SUSPENSÃO", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("AMORTECEDORES", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("CORRENTE DE TRANSMISSÃO", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("SISTEMA DE ARREFECIMENTO", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("CABOS APARENTES", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("SISTEMA 4x4 ", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("PUNHO DE SEGURANÇA", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("BOTÕES EM GERAL E FUNCIONAMENTO", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("ENCOSTO", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("ASSENTO", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("PAINEL DIGITAL", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("CARENAGEM (PRINCIPAL, ESTRIBO, PROTETORES)", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("PINTURA", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("ADESIVOS", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("ESPELHO RETROVISOR", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("FAROL", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("LANTERNA", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("REFLETOR", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("PNEUS", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("RODAS", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("PÉ DE APOIO / CAVALETE", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += espacolinha;
            textFormatter.DrawString("KIT DO CLIENTE", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));

            //DESENHA LINHAS VERTICAIS DA TABELA DE ITENS
            for (int i = 1; i < 27; i++)
            {
                y2 += espacolinha;
                graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(30, y2, page.Width - 65, 0));
            }

            //LEGENDA
            y = y2 + espacamentoentregrupos;
            textFormatter.DrawString("LEGENDA", fontTituloTexto, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));
            
            //CONTORNO
            y += 15;
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(30, y, 200, 36));
            
            //LINHAS VERTICAIS DA LEGENDA
            y2 = y;
            for (int i = 1; i < 4; i++)
            {
                y2 += 12;
                graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(30, y2, 200, 0));
            }

            //TEXTOS DA LEGENDA
            textFormatter.DrawString("** OK = Em ordem", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += 12;
            textFormatter.DrawString("** NC = Não conforme", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
            y += 12;
            textFormatter.DrawString("** NP = Não possui", fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));

            //ANOTAÇÕES
            y += espacamentoentregrupos;
            textFormatter.DrawString("ANOTAÇÕES", fontTituloTexto, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));
            //CONTORNO ANOTACOES
            y += 15;
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(30, y, page.Width - 65, 75));
            y2 = y;
            //LINHAS ANOTACOES
            for (int i = 1; i < 5; i++)
            {
                y2 += 15;
                graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(30, y2, page.Width - 65, 0));
            }

            //ASSINATURAS
            //LINHAS 
            y = y2;
            y += 70;
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(90, y, 170, 0));
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(320, y, 170, 0));

            //TEXTO
            y += 2;
            textFormatter.DrawString("Funcionário responsável", fontItens, XBrushes.Black, new XRect(120, y, 150, 150));
            textFormatter.DrawString("Responsável pela retirada", fontItens, XBrushes.Black, new XRect(350, y, 150, 150));

            //RODAPE
            y = page.Height.Point - 30;
            DateTime hoje = DateTime.Now;
            var data = hoje.ToString("dd/MM/yyyy");
            var hora = hoje.ToString("HH:mm:ss");
            textFormatter.DrawString(data + "-" + hora, fontRodape, XBrushes.Black, new XRect(page.Width - 100, y, 100, 100));

            try
            {
                //SE EXISTIR ARQUIVO ANTERIOR, DELETA
                if (File.Exists(fileoutput))
                {
                    File.Delete(fileoutput);
                }

                //GERA PDF NO DESTINO
                doc.Save(fileoutput);
                retorno = true;
            }
            catch (Exception)
            {
                retorno = false;
            }


            return retorno;
        }

        public bool GerarItensVenda(int numerovenda, string fileoutput)
        {
            bool retorno = false;
            double espacamentoentregrupos = 20;
            double y = 30;
            var x = 30;
            


            var doc = new PdfDocument();
            var page = doc.AddPage();
            var graphics = XGraphics.FromPdfPage(page);
            var textFormatter = new PdfSharp.Drawing.Layout.XTextFormatter(graphics);
            var fontTitulo = new XFont("Arial", 16, XFontStyle.Bold);
            var fontTexto = new XFont("Arial", 10);
            var fontRodape = new XFont("Arial", 8);
            var fontTituloTexto = new XFont("Arial", 12, XFontStyle.Bold);
            var fontItens = new XFont("Arial", 10, XFontStyle.Italic);

            double tampagina = page.Height;

            //CONTORNO DA FOLHA
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(20, 20, page.Width - 40, page.Height - 40));

            //TITULO
            textFormatter.Alignment = PdfSharp.Drawing.Layout.XParagraphAlignment.Center;
            textFormatter.DrawString("ITENS DA GARANTIA", fontTitulo, XBrushes.Black, new XRect(x, y, page.Width - 60, page.Height - 60));

            //DADOS DO CLIENTE
            textFormatter.Alignment = PdfSharp.Drawing.Layout.XParagraphAlignment.Left;
            y += espacamentoentregrupos + 10;
            textFormatter.DrawString("DADOS DO REPRESENTANTE", fontTituloTexto, XBrushes.Black, new XRect(x, y, page.Width - 10, page.Height - 10));
            y += 15;
            textFormatter.DrawString("REPRESENTANTE:", fontTexto, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));
            //textFormatter.DrawString("DOCUMENTO:", fontTexto, XBrushes.Black, new XRect(300, y, page.Width - 10, page.Height - 10));
            y += 10;
            textFormatter.DrawString(nome, fontItens, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));

            //DADOS DA VENDA
            y += espacamentoentregrupos;
            textFormatter.DrawString("DADOS DA GARANTIA", fontTituloTexto, XBrushes.Black, new XRect(x, y, page.Width - 10, page.Height - 10));
            y += 15;
            textFormatter.DrawString("Nº VENDA:", fontTexto, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));
            textFormatter.DrawString("DESCRIÇÃO DO PROBLEMA:", fontTexto, XBrushes.Black, new XRect(100, y, page.Width - 10, page.Height - 10));
            y += 10;
            textFormatter.DrawString(numerovenda.ToString(), fontItens, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));
            textFormatter.DrawString(descproblema, fontItens, XBrushes.Black, new XRect(100, y, page.Width - 10, page.Height - 10));

            //CHECKLIST
            y += espacamentoentregrupos;
            textFormatter.DrawString("ITENS", fontTituloTexto, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));
            y += 15;

            double alturacontorno = y;
            y += 2;
            textFormatter.DrawString("DESCRIÇÃO", fontTexto, XBrushes.Black, new XRect(35, y, page.Width - 10, page.Height - 10));
            //textFormatter.DrawString("OK", fontTexto, XBrushes.Black, new XRect(page.Width - 92, y, page.Width - 10, page.Height - 10));

            //ITEM DA TABELA
            double y2 = y;
            double espacolinha = 15;

            ListaNotasFiscaisItens itens = new ListaNotasFiscaisItens();

            itens.LerRegistros(numerovenda);
            
            y += espacolinha + 1;

            foreach (var item in itens)
            {
                textFormatter.DrawString(item.Descricao, fontItens, XBrushes.Black, new XRect(40, y, page.Width - 10, page.Height - 10));
                graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(30, y - 1, page.Width - 65, 0));
                y += espacolinha;

                if (y > (tampagina - 45))
                {
                    tampagina = RetornaNovoTamanho(page.Height);
                    page = doc.AddPage();
                    y = 25;
                    graphics = XGraphics.FromPdfPage(page);
                    textFormatter = new PdfSharp.Drawing.Layout.XTextFormatter(graphics);
                    graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(20, 20, page.Width - 40, page.Height - 40));
                }
            }            

            int tamItens = itens.Count();
            tamItens++;                       
            
            graphics.DrawRectangle(XPens.Black, XBrushes.Transparent, new XRect(30, alturacontorno, page.Width - 65, espacolinha * tamItens));

            if (y > (tampagina - 130))
            {
                tampagina = RetornaNovoTamanho(page.Height);
                page = doc.AddPage();
                y = 25;
                graphics = XGraphics.FromPdfPage(page);
                textFormatter = new PdfSharp.Drawing.Layout.XTextFormatter(graphics);
                graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(20, 20, page.Width - 40, page.Height - 40));
            }
            //ANOTAÇÕES
            y += espacamentoentregrupos;
            textFormatter.DrawString("ANOTAÇÕES", fontTituloTexto, XBrushes.Black, new XRect(30, y, page.Width - 10, page.Height - 10));

            //CONTORNO ANOTACOES
            y += 15;
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(30, y, page.Width - 65, 75));
            y2 = y;
            //LINHAS ANOTACOES
            for (int i = 1; i < 5; i++)
            {
                y2 += 15;
                graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(30, y2, page.Width - 65, 0));
            }

            //ASSINATURAS
            //LINHAS
            if (y2 > (tampagina - 112))
            {
                tampagina = RetornaNovoTamanho(page.Height);
                page = doc.AddPage();
                y2 = 35;
                graphics = XGraphics.FromPdfPage(page);
                textFormatter = new PdfSharp.Drawing.Layout.XTextFormatter(graphics);
                graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(20, 20, page.Width - 40, page.Height - 40));
            }
            y = y2;
            y += 70;
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(90, y, 170, 0));
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(320, y, 170, 0));

            //TEXTO
            y += 2;
            textFormatter.DrawString("Funcionário responsável", fontItens, XBrushes.Black, new XRect(120, y, 150, 150));
            textFormatter.DrawString("Responsável pela retirada", fontItens, XBrushes.Black, new XRect(350, y, 150, 150));

            //RODAPE
            y = page.Height.Point - 30;
            DateTime hoje = DateTime.Now;
            var data = hoje.ToString("dd/MM/yyyy");
            var hora = hoje.ToString("HH:mm:ss");
            textFormatter.DrawString(data + "-" + hora, fontRodape, XBrushes.Black, new XRect(page.Width - 100, y, 100, 100));

            try
            {
                //SE EXISTIR ARQUIVO ANTERIOR, DELETA
                if (File.Exists(fileoutput))
                {
                    File.Delete(fileoutput);
                }

                //GERA PDF NO DESTINO
                doc.Save(fileoutput);
                retorno = true;
            }
            catch (Exception e)
            {
                retorno = false;
            }


            return retorno;
        }

        public double RetornaNovoTamanho(double page)
        {
            return page + 595;
        }
    }
}