import { Component } from "@angular/core";

@Component({
  selector: "app-home",
  templateUrl: "home.page.html",
  styleUrls: ["home.page.scss"],
})
export class HomePage {

  constructor() {}

  public prieceAlcool: GLfloat = 0
  public prieceGasolina: GLfloat = 0
  public resultCalculatePriece: String = "Resultado"
  public p: String = "evd" 


  public calculetePriece():void
  {
    if(this.prieceAlcool != 0 && this.prieceGasolina != 0)
    {
      let ppriecealcool = this.prieceAlcool
      let ppriecegasolina = this.prieceGasolina
 
      if ((ppriecealcool/ppriecegasolina)>= 0.7) 
      {
        this.resultCalculatePriece= "Melhor utilizar Gasolina"
      }
      else
      {
        this.resultCalculatePriece= "Melhor utilizar Alcool"
      }
    }
    else
    {
      this.resultCalculatePriece= "Preencha corretamente os campos!"
    }
    
  }
  

}
