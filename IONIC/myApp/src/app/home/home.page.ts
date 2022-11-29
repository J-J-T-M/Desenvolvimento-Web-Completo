import * as core from '@angular/core';
import { NavController } from '@ionic/angular';

@core.Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage  {

  constructor(private nav: NavController) { }

  public searchResult: String = ""
  public search: String = '';
  public titulo: String = "My First App"
  public imgRandomica: String ="https://source.unsplash.com/random/200x200"

  public Atualiza(): void {
    this.titulo = "Texto alterado"
  }
  public acao(): void {
    this.titulo = "Botão clicado"
  }
  // posso ocultar o public do método e o seu retorno somente quando ele for public e void
  openButtons()
  {
   this.nav.navigateForward('botoes')
  }
  openList()
  {
    this.nav.navigateForward('lista')
  }
  toRecover()
  {
    this.searchResult = this.search
  }
}
