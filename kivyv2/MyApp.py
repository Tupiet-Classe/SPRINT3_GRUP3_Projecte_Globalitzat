from kivymd.app import MDApp
from kivymd.uix.screenmanager import MDScreenManager
from views.CourseScreen import CourseScreen
from views.DetailCourseScreen import DetailCourseScreen


class MyApp(MDApp):
    #variable global que encara no definim
    sm = None
    # Mètode per crear la classe, aquí estaria l'inici
    
    #Definim la variable global per a que sigui ('root') que es el screen manager MDScreenManager
    def build(self):
        self.title ="Inici"
        self.sm = self.root
    
    #Funcio per canviar entre pantalles, canvia la pantalla en la que estem per la que volem al ScreenManager (my.kv)
    def switch_screen(self, screen_name):
        self.sm.current = screen_name

#Iniciem la aplicació de kivyMD, aquest condicional es compleix quan executem l'aplicacio al vscode 
#sense importar res
if __name__ == "__main__":
    app = MyApp() #Instància d'una classe
    app.run()
 
